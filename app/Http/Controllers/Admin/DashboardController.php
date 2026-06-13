<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Concours;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class DashboardController extends Controller
{
    public function index()
    {
        $totalCandidats = Concours::count();

        $totalHommes = Concours::where('sexe', 'Masculin')->count();
        $totalFemmes = Concours::where('sexe', 'Féminin')->count();

        $statsSpecialites = Concours::selectRaw('specialites.nom_specialite as label, COUNT(concours.id) as total')
            ->join('specialites', 'concours.specialite_id', '=', 'specialites.id')
            ->groupBy('specialites.nom_specialite')
            ->orderBy('specialites.nom_specialite')
            ->get();

        $statsSexe = Concours::selectRaw('sexe as label, COUNT(*) as total')
            ->groupBy('sexe')
            ->get();

        $statsRegions = Concours::selectRaw('regions.nom_region as label, COUNT(concours.id) as total')
            ->join('regions', 'concours.region_id', '=', 'regions.id')
            ->groupBy('regions.nom_region')
            ->orderBy('regions.nom_region')
            ->get();

        $statsProfessions = Concours::selectRaw('profession as label, COUNT(*) as total')
            ->groupBy('profession')
            ->get();

        $users = User::orderBy('name')->get();

        return view('admin.dashboard', compact(
            'totalCandidats',
            'totalHommes',
            'totalFemmes',
            'statsSpecialites',
            'statsSexe',
            'statsRegions',
            'statsProfessions',
            'users'
        ));
    }

    public function updateRole(Request $request, User $user)
    {
        if (!auth()->user()->isSuperAdmin()) {
            abort(403, 'Accès refusé. Seul le super administrateur peut modifier les rôles.');
        }

        $request->validate([
            'role' => 'required|in:super_admin,admin,scolarite,viewer',
        ]);

        $user->update([
            'role' => $request->role,
        ]);

        return redirect()
            ->back()
            ->with('success', 'Rôle modifié avec succès.');
    }

    public function imprimerListeCentreRepartie(Request $request)
{
    $request->validate([
        'centre_examen' => 'required|string|in:Bertoua,Douala,Dschang,Ebolowa,Garoua,Meyomessala,Yaounde',
    ]);

    $centre = $request->centre_examen;

    $candidats = Concours::with([
            'cycle',
            'filiere',
            'specialite',
            'region',
            'departement',
            'arrondissement'
        ])
        ->where('centre_examen', $centre)
        ->orderBy('cycle_id')
        ->orderBy('filiere_id')
        ->orderBy('specialite_id')
        ->orderBy('numero_candidat')
        ->get();

    $groupes = $candidats->groupBy(function ($candidat) {
        return $candidat->cycle->nom_cycle ?? 'Cycle non défini';
    })->map(function ($cycleGroup) {
        return $cycleGroup->groupBy(function ($candidat) {
            return $candidat->filiere->nom_filiere ?? 'Filière non définie';
        })->map(function ($filiereGroup) {
            return $filiereGroup->groupBy(function ($candidat) {
                return $candidat->specialite->nom_specialite ?? 'Spécialité non définie';
            });
        });
    });

    $pdf = Pdf::loadView('admin.pdf.liste_candidats_centre_repartie', [
        'centre' => $centre,
        'groupes' => $groupes,
        'totalCandidats' => $candidats->count(),
        'generated_at' => now()->format('d/m/Y H:i:s'),
    ])->setPaper('a4', 'landscape');

    return $pdf->stream('liste_candidats_'.$centre.'_repartie.pdf');
}
}