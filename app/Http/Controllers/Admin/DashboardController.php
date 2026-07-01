<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Concours;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Statistiques générales
        |--------------------------------------------------------------------------
        */

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
        | Statistiques par spécialité
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

        /*
        |--------------------------------------------------------------------------
        | Statistiques par sexe
        |--------------------------------------------------------------------------
        */

        $statsSexe = Concours::selectRaw("COALESCE(NULLIF(sexe, ''), 'Non défini') as label, COUNT(*) as total")
            ->groupByRaw("COALESCE(NULLIF(sexe, ''), 'Non défini')")
            ->orderByDesc('total')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Statistiques par région
        |--------------------------------------------------------------------------
        */

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

        /*
        |--------------------------------------------------------------------------
        | Statistiques par profession
        |--------------------------------------------------------------------------
        */

        $statsProfessions = Concours::selectRaw("COALESCE(NULLIF(profession, ''), 'Non défini') as label, COUNT(*) as total")
            ->groupByRaw("COALESCE(NULLIF(profession, ''), 'Non défini')")
            ->orderByDesc('total')
            ->limit(10)
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Statistiques par type de handicap
        |--------------------------------------------------------------------------
        */

        $statsHandicap = Concours::selectRaw("COALESCE(NULLIF(type_handicap, ''), 'Non précisé') as label, COUNT(*) as total")
            ->whereRaw($this->lowerTextColumn('handicape') . " IN ('oui', 'yes', '1', 'true')")
            ->groupByRaw("COALESCE(NULLIF(type_handicap, ''), 'Non précisé')")
            ->orderByDesc('total')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Liste des candidats avec relations
        |--------------------------------------------------------------------------
        */

        $candidatsQuery = Concours::with([
            'cycle',
            'filiere',
            'specialite',
            'pays',
            'region',
            'departement',
            'arrondissement',
        ])->orderByDesc('id');

        /*
        |--------------------------------------------------------------------------
        | Recherche
        |--------------------------------------------------------------------------
        */

        if ($request->filled('search')) {
            $search = trim($request->search);
            $operator = $this->searchOperator();

            $candidatsQuery->where(function ($query) use ($search, $operator) {
                $query->where('nom_complet', $operator, '%' . $search . '%')
                    ->orWhere('numero_recu', $operator, '%' . $search . '%')
                    ->orWhere('numero_candidat', $operator, '%' . $search . '%')
                    ->orWhere('telephone', $operator, '%' . $search . '%')
                    ->orWhere('numero_telephone_candidat', $operator, '%' . $search . '%')
                    ->orWhere('email', $operator, '%' . $search . '%');
            });
        }

        if ($request->filled('centre_examen')) {
            $candidatsQuery->where('centre_examen', $request->centre_examen);
        }

        if ($request->filled('sexe')) {
            $candidatsQuery->where('sexe', $request->sexe);
        }

        if ($request->filled('handicape')) {
            if ($request->handicape === 'Oui') {
                $candidatsQuery->whereRaw(
                    $this->lowerTextColumn('handicape') . " IN ('oui', 'yes', '1', 'true')"
                );
            }

            if ($request->handicape === 'Non') {
                $candidatsQuery->where(function ($query) {
                    $query->whereNull('handicape')
                        ->orWhereRaw(
                            $this->lowerTextColumn('handicape') . " NOT IN ('oui', 'yes', '1', 'true')"
                        );
                });
            }
        }

        $candidats = $candidatsQuery
            ->paginate(25)
            ->withQueryString();

        $users = User::orderByDesc('id')->get();

        return view('admin.dashboard', compact(
            'totalCandidats',
            'totalHommes',
            'totalFemmes',
            'totalHandicapes',
            'statsSpecialites',
            'statsSexe',
            'statsRegions',
            'statsProfessions',
            'statsHandicap',
            'candidats',
            'users'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | Créer un utilisateur
    |--------------------------------------------------------------------------
    */

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

    /*
    |--------------------------------------------------------------------------
    | Modifier le rôle d'un utilisateur
    |--------------------------------------------------------------------------
    */

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

    /*
    |--------------------------------------------------------------------------
    | Imprimer liste par centre et cycle
    |--------------------------------------------------------------------------
    */

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

    /*
    |--------------------------------------------------------------------------
    | Imprimer liste répartie par centre, cycle, filière et spécialité
    |--------------------------------------------------------------------------
    */

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

    /*
    |--------------------------------------------------------------------------
    | Helpers base de données
    |--------------------------------------------------------------------------
    */

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