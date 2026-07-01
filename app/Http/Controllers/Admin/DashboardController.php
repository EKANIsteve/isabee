<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Concours;
use App\Models\Cycle;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use ZipArchive;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalCandidats = Concours::count();

        $totalHommes = Concours::whereIn('sexe', [
            'Masculin',
            'masculin',
            'Homme',
            'homme',
            'M',
            'm',
        ])->count();

        $totalFemmes = Concours::whereIn('sexe', [
            'Féminin',
            'féminin',
            'Feminin',
            'feminin',
            'Femme',
            'femme',
            'F',
            'f',
        ])->count();

        $totalHandicapes = Concours::whereRaw(
            $this->lowerTextColumn('handicape') . " IN ('oui', 'yes', '1', 'true')"
        )->count();

        /*
        |--------------------------------------------------------------------------
        | Statistiques par cycle puis par spécialité
        |--------------------------------------------------------------------------
        */

        $statsSpecialitesParCycle = Concours::select(
                'cycle_id',
                'specialite_id',
                DB::raw('COUNT(*) as total')
            )
            ->with(['cycle', 'specialite'])
            ->groupBy('cycle_id', 'specialite_id')
            ->orderBy('cycle_id')
            ->orderByDesc('total')
            ->get()
            ->groupBy(function ($item) {
                return $item->cycle?->nom_cycle ?? 'Cycle non défini';
            })
            ->map(function ($items, $cycleName) {
                return (object) [
                    'cycle' => $cycleName,
                    'total' => $items->sum('total'),
                    'specialites' => $items->map(function ($item) {
                        return (object) [
                            'label' => $item->specialite?->nom_specialite
                                ?? $item->specialite?->nom
                                ?? $item->specialite?->libelle
                                ?? $item->specialite?->designation
                                ?? $item->specialite?->intitule
                                ?? ($item->specialite_id ? 'Spécialité ID ' . $item->specialite_id : 'Non défini'),
                            'total' => $item->total,
                        ];
                    })->values(),
                ];
            })
            ->values();

        /*
        |--------------------------------------------------------------------------
        | Ancienne statistique globale par spécialité
        |--------------------------------------------------------------------------
        */

        $statsSpecialites = Concours::select('specialite_id', DB::raw('COUNT(*) as total'))
            ->with('specialite')
            ->groupBy('specialite_id')
            ->orderByDesc('total')
            ->get()
            ->map(function ($item) {
                return (object) [
                    'label' => $item->specialite?->nom_specialite
                        ?? $item->specialite?->nom
                        ?? $item->specialite?->libelle
                        ?? $item->specialite?->designation
                        ?? $item->specialite?->intitule
                        ?? ($item->specialite_id ? 'Spécialité ID ' . $item->specialite_id : 'Non défini'),
                    'total' => $item->total,
                ];
            });

        $statsSexe = Concours::selectRaw("COALESCE(NULLIF(sexe, ''), 'Non défini') as label, COUNT(*) as total")
            ->groupByRaw("COALESCE(NULLIF(sexe, ''), 'Non défini')")
            ->orderByDesc('total')
            ->get();

        $statsRegions = Concours::select('region_id', DB::raw('COUNT(*) as total'))
            ->with('region')
            ->groupBy('region_id')
            ->orderByDesc('total')
            ->get()
            ->map(function ($item) {
                return (object) [
                    'label' => $item->region?->nom_region
                        ?? $item->region?->nom
                        ?? $item->region?->libelle
                        ?? $item->region?->designation
                        ?? ($item->region_id ? 'Région ID ' . $item->region_id : 'Non défini'),
                    'total' => $item->total,
                ];
            });

        $statsProfessions = Concours::selectRaw("COALESCE(NULLIF(profession, ''), 'Non défini') as label, COUNT(*) as total")
            ->groupByRaw("COALESCE(NULLIF(profession, ''), 'Non défini')")
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        $statsHandicap = Concours::selectRaw("COALESCE(NULLIF(type_handicap, ''), 'Non précisé') as label, COUNT(*) as total")
            ->whereRaw($this->lowerTextColumn('handicape') . " IN ('oui', 'yes', '1', 'true')")
            ->groupByRaw("COALESCE(NULLIF(type_handicap, ''), 'Non précisé')")
            ->orderByDesc('total')
            ->get();

        $candidatsQuery = $this->candidatsQuery($request);

        $candidats = $candidatsQuery
            ->orderByDesc('id')
            ->paginate(25)
            ->withQueryString();

        $users = User::orderByDesc('id')->get();

        return view('admin.dashboard', compact(
            'totalCandidats',
            'totalHommes',
            'totalFemmes',
            'totalHandicapes',
            'statsSpecialites',
            'statsSpecialitesParCycle',
            'statsSexe',
            'statsRegions',
            'statsProfessions',
            'statsHandicap',
            'candidats',
            'users'
        ));
    }

    public function exportCandidatsExcel(Request $request)
    {
        $this->ensureCanExport();

        $candidats = $this->candidatsQuery($request)
            ->orderByDesc('id')
            ->get();

        $filename = 'candidats-isabee-' . now()->format('Y-m-d-H-i-s') . '.csv';

        return response()->streamDownload(function () use ($candidats) {
            $handle = fopen('php://output', 'w');

            // UTF-8 BOM pour que les accents s'affichent bien dans Excel
            fprintf($handle, chr(0xEF) . chr(0xBB) . chr(0xBF));

            fputcsv($handle, $this->exportHeaders(), ';');

            foreach ($candidats as $candidat) {
                fputcsv($handle, $this->exportRow($candidat), ';');
            }

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }

    public function exportCandidatsMedias(Request $request)
    {
        $this->ensureCanExport();

        $candidats = $this->candidatsQuery($request)
            ->orderByDesc('id')
            ->get();

        $exportDir = storage_path('app/exports');

        if (!is_dir($exportDir)) {
            mkdir($exportDir, 0775, true);
        }

        $baseName = 'export-candidats-isabee-' . now()->format('Y-m-d-H-i-s');

        $csvPath = $exportDir . '/' . $baseName . '.csv';
        $zipPath = $exportDir . '/' . $baseName . '.zip';

        /*
        |--------------------------------------------------------------------------
        | Création du CSV inclus dans le ZIP
        |--------------------------------------------------------------------------
        */

        $csv = fopen($csvPath, 'w');

        fprintf($csv, chr(0xEF) . chr(0xBB) . chr(0xBF));
        fputcsv($csv, $this->exportHeaders(), ';');

        foreach ($candidats as $candidat) {
            fputcsv($csv, $this->exportRow($candidat), ';');
        }

        fclose($csv);

        /*
        |--------------------------------------------------------------------------
        | Création du ZIP avec photos + reçus scannés
        |--------------------------------------------------------------------------
        */

        $zip = new ZipArchive();

        if ($zip->open($zipPath, ZipArchive::CREATE | ZipArchive::OVERWRITE) !== true) {
            return back()->with('error', 'Impossible de créer le fichier ZIP.');
        }

        $zip->addFile($csvPath, 'candidats.csv');

        foreach ($candidats as $candidat) {
            $safeName = Str::slug($candidat->nom_complet ?: 'candidat-' . $candidat->id);
            $folderName = str_pad((string) $candidat->id, 5, '0', STR_PAD_LEFT) . '-' . $safeName;

            $photoPath = $this->publicFileAbsolutePath($candidat->photo_etudiant);

            if ($photoPath) {
                $extension = pathinfo($photoPath, PATHINFO_EXTENSION) ?: 'jpg';

                $zip->addFile(
                    $photoPath,
                    'photos/' . $folderName . '/photo.' . $extension
                );
            }

            $documentPath = $this->publicFileAbsolutePath($candidat->document_scanner);

            if ($documentPath) {
                $extension = pathinfo($documentPath, PATHINFO_EXTENSION) ?: 'pdf';

                $zip->addFile(
                    $documentPath,
                    'recus_scannes/' . $folderName . '/recu_scanner.' . $extension
                );
            }
        }

        $zip->close();

        if (file_exists($csvPath)) {
            unlink($csvPath);
        }

        return response()
            ->download($zipPath)
            ->deleteFileAfterSend(true);
    }

    public function storeUser(Request $request)
    {
        if (!auth()->user()->isSuperAdmin()) {
            abort(403, 'Seul le Super Admin peut créer un utilisateur.');
        }

        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'role' => ['required', 'in:super_admin,admin,scolarite,viewer'],
        ]);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
        ]);

        return back()->with('success', 'Utilisateur créé avec succès.');
    }

    public function updateRole(Request $request, User $user)
    {
        if (!auth()->user()->isSuperAdmin()) {
            abort(403, 'Seul le Super Admin peut modifier les rôles.');
        }

        $data = $request->validate([
            'role' => ['required', 'in:super_admin,admin,scolarite,viewer'],
        ]);

        if ($user->id === auth()->id() && $data['role'] !== 'super_admin') {
            return back()->with('error', 'Vous ne pouvez pas retirer votre propre rôle Super Admin.');
        }

        $user->update([
            'role' => $data['role'],
        ]);

        return back()->with('success', 'Rôle modifié avec succès.');
    }

    public function imprimerListeCentreCycle(Request $request)
    {
        $centre = $request->get('centre_examen');

        $query = Concours::with([
            'cycle',
            'filiere',
            'specialite',
            'pays',
            'region',
            'departement',
            'arrondissement',
        ])
            ->orderBy('cycle_id')
            ->orderBy('filiere_id')
            ->orderBy('specialite_id')
            ->orderBy('nom_complet');

        if ($centre) {
            $query->where('centre_examen', $centre);
        }

        $candidats = $query->get();

        return view('admin.concours.print-centre-cycle', compact('candidats', 'centre'));
    }

    public function imprimerListeCentreRepartie(Request $request)
    {
        $request->validate([
            'centre_examen' => ['required', 'string', 'max:255'],
        ]);

        $centre = $request->centre_examen;

        $candidats = Concours::with([
            'cycle',
            'filiere',
            'specialite',
            'pays',
            'region',
            'departement',
            'arrondissement',
        ])
            ->where('centre_examen', $centre)
            ->orderBy('cycle_id')
            ->orderBy('filiere_id')
            ->orderBy('specialite_id')
            ->orderBy('nom_complet')
            ->get();

        return view('admin.concours.print-centre-repartie', compact('candidats', 'centre'));
    }

    private function candidatsQuery(Request $request)
    {
        $query = Concours::with([
            'cycle',
            'filiere',
            'specialite',
            'pays',
            'region',
            'departement',
            'arrondissement',
        ]);

        if ($request->filled('search')) {
            $search = trim($request->search);
            $operator = $this->searchOperator();

            $query->where(function ($q) use ($search, $operator) {
                $q->where('nom_complet', $operator, '%' . $search . '%')
                    ->orWhere('numero_recu', $operator, '%' . $search . '%')
                    ->orWhere('numero_candidat', $operator, '%' . $search . '%')
                    ->orWhere('telephone', $operator, '%' . $search . '%')
                    ->orWhere('numero_telephone_candidat', $operator, '%' . $search . '%')
                    ->orWhere('email', $operator, '%' . $search . '%');
            });
        }

        if ($request->filled('centre_examen')) {
            $query->where('centre_examen', $request->centre_examen);
        }

        if ($request->filled('sexe')) {
            $query->where('sexe', $request->sexe);
        }

        if ($request->filled('handicape')) {
            if ($request->handicape === 'Oui') {
                $query->whereRaw(
                    $this->lowerTextColumn('handicape') . " IN ('oui', 'yes', '1', 'true')"
                );
            }

            if ($request->handicape === 'Non') {
                $query->where(function ($q) {
                    $q->whereNull('handicape')
                        ->orWhereRaw(
                            $this->lowerTextColumn('handicape') . " NOT IN ('oui', 'yes', '1', 'true')"
                        );
                });
            }
        }

        return $query;
    }

    private function exportHeaders(): array
    {
        return [
            'ID',
            'N° reçu',
            'N° candidat',
            'Nom complet',
            'Date naissance',
            'Lieu naissance',
            'NCI',
            'Sexe',
            'Téléphone',
            'Téléphone candidat',
            'Email',
            'Centre examen',
            'Cycle',
            'Filière',
            'Spécialité',
            'Pays',
            'Région',
            'Département',
            'Arrondissement',
            'Nationalité',
            'Situation matrimoniale',
            'Profession',
            'Langue composition',
            'Nom père',
            'Téléphone père',
            'Profession père',
            'Nom mère',
            'Téléphone mère',
            'Profession mère',
            'Ville parents',
            'Personne urgence',
            'Téléphone urgence',
            'Ville urgence',
            'Diplôme entrée',
            'Série diplôme',
            'Année obtention',
            'Émetteur diplôme',
            'Moyenne obtenue',
            'N° diplôme',
            'Sport pratiqué',
            'Handicapé',
            'Type handicap',
            'Photo URL',
            'Reçu / document scanné URL',
            'Date création',
            'Dernière modification',
        ];
    }

    private function exportRow(Concours $candidat): array
    {
        return [
            $candidat->id,
            $candidat->numero_recu,
            $candidat->numero_candidat,
            $candidat->nom_complet,
            optional($candidat->date_naissance)->format('d/m/Y'),
            $candidat->lieu_naissance,
            $candidat->numero_nci,
            $candidat->sexe,
            $candidat->telephone,
            $candidat->numero_telephone_candidat,
            $candidat->email,
            $candidat->centre_examen,
            $candidat->cycle?->nom_cycle,
            $candidat->filiere?->nom_filiere
                ?? $candidat->filiere?->nom
                ?? $candidat->filiere?->libelle
                ?? $candidat->filiere?->designation,
            $candidat->specialite?->nom_specialite
                ?? $candidat->specialite?->nom
                ?? $candidat->specialite?->libelle
                ?? $candidat->specialite?->designation
                ?? $candidat->specialite?->intitule,
            $candidat->pays?->nom_pays
                ?? $candidat->pays?->nom
                ?? $candidat->pays?->libelle,
            $candidat->region?->nom_region
                ?? $candidat->region?->nom
                ?? $candidat->region?->libelle,
            $candidat->departement?->nom_departement
                ?? $candidat->departement?->nom
                ?? $candidat->departement?->libelle,
            $candidat->arrondissement?->nom_arrondissement
                ?? $candidat->arrondissement?->nom
                ?? $candidat->arrondissement?->libelle,
            $candidat->nationalite,
            $candidat->marital,
            $candidat->profession,
            $candidat->langue_composition,
            $candidat->nom_pere,
            $candidat->numero_telephone_pere,
            $candidat->profession_pere,
            $candidat->nom_mere,
            $candidat->numero_telephone_mere,
            $candidat->profession_mere,
            $candidat->ville_parents,
            $candidat->Personne_a_contacter_cas_urgent,
            $candidat->numero_telephone_Personne_a_contacte_urgent,
            $candidat->ville_Personne_a_contacte_cas_urgent,
            $candidat->diplome_entre,
            $candidat->serie_diplome,
            $candidat->annee_obtention_diplome,
            $candidat->emetteur_entre_diplome,
            $candidat->moyenne_obtenu_diplome,
            $candidat->numero_diplome_entre,
            $candidat->sport_pratique,
            $candidat->handicape,
            $candidat->type_handicap,
            $candidat->photo_etudiant ? $candidat->photo_url : '',
            $candidat->document_scanner ? $candidat->document_url : '',
            optional($candidat->created_at)->format('d/m/Y H:i'),
            optional($candidat->updated_at)->format('d/m/Y H:i'),
        ];
    }

    private function publicFileAbsolutePath(?string $path): ?string
    {
        if (!$path) {
            return null;
        }

        if (Str::startsWith($path, ['http://', 'https://'])) {
            return null;
        }

        $path = Str::replaceFirst('storage/', '', $path);

        $absolutePath = Storage::disk('public')->path($path);

        if (file_exists($absolutePath)) {
            return $absolutePath;
        }

        return null;
    }

    private function ensureCanExport(): void
    {
        $role = auth()->user()->role ?? null;

        if (!in_array($role, ['super_admin', 'admin', 'scolarite'], true)) {
            abort(403, 'Vous n’êtes pas autorisé à exporter les données.');
        }
    }

    private function searchOperator(): string
    {
        return DB::connection()->getDriverName() === 'pgsql' ? 'ILIKE' : 'LIKE';
    }

    private function lowerTextColumn(string $column): string
    {
        $driver = DB::connection()->getDriverName();

        if ($driver === 'pgsql') {
            return "LOWER(CAST($column AS TEXT))";
        }

        return "LOWER(CAST($column AS CHAR))";
    }
}