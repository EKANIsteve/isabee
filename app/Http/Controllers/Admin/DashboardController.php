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

        $totalHandicapes = Concours::where(function ($query) {
            $query->whereRaw("LOWER(CAST(handicape AS TEXT)) IN ('oui', 'yes', '1', 'true')");
        })->count();

        $statsSpecialites = Concours::select('specialite_id', DB::raw('COUNT(*) as total'))
            ->with('specialite')
            ->groupBy('specialite_id')
            ->orderByDesc('total')
            ->get()
            ->map(function ($item) {
                return (object) [
                    'label' => optional($item->specialite)->nom
                        ?? optional($item->specialite)->libelle
                        ?? optional($item->specialite)->designation
                        ?? optional($item->specialite)->intitule
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
                    'label' => optional($item->region)->nom
                        ?? optional($item->region)->libelle
                        ?? optional($item->region)->designation
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
            ->whereRaw("LOWER(CAST(handicape AS TEXT)) IN ('oui', 'yes', '1', 'true')")
            ->groupByRaw("COALESCE(NULLIF(type_handicap, ''), 'Non précisé')")
            ->orderByDesc('total')
            ->get();

        $candidatsQuery = Concours::with([
                'cycle',
                'filiere',
                'specialite',
                'pays',
                'region',
                'departement',
                'arrondissement',
            ])
            ->orderByDesc('id');

        if ($request->filled('search')) {
            $search = trim($request->search);

            $candidatsQuery->where(function ($query) use ($search) {
                $query->where('nom_complet', 'ILIKE', '%' . $search . '%')
                    ->orWhere('numero_recu', 'ILIKE', '%' . $search . '%')
                    ->orWhere('numero_candidat', 'ILIKE', '%' . $search . '%')
                    ->orWhere('telephone', 'ILIKE', '%' . $search . '%')
                    ->orWhere('numero_telephone_candidat', 'ILIKE', '%' . $search . '%')
                    ->orWhere('email', 'ILIKE', '%' . $search . '%');
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
                $candidatsQuery->whereRaw("LOWER(CAST(handicape AS TEXT)) IN ('oui', 'yes', '1', 'true')");
            }

            if ($request->handicape === 'Non') {
                $candidatsQuery->where(function ($query) {
                    $query->whereNull('handicape')
                        ->orWhereRaw("LOWER(CAST(handicape AS TEXT)) NOT IN ('oui', 'yes', '1', 'true')");
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

    public function updateUserRole(Request $request, User $user)
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
}