<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Filiere;
use App\Models\Cycle;

class FiliereSeeder extends Seeder
{
    public function run(): void
    {
        Filiere::truncate();

        // Récupérer le cycle "Premier cycle"
        $premierCycle = Cycle::where('nom_cycle', 'Premier cycle')->first();

        $filieres = [
            'Energies Renouvelables (ENREN)',
            'Génie de l’Habitat (GH)',
            'Génie Rural (GR)',
            'Hydraulique, Sciences et Technologies de l’Eau (HSTE)',
            'Météorologie et Climatologie (MC)',
            'Agriculture, Elevage et Sciences Halieutiques (AESH)',
            'Foresterie, Sciences et Technologies du Bois (FSTB)',
            'Economie, Sociologie Rurale et Vulgarisation Agricole (ESVA)',
            'Sciences de l’Environnement (SE)'
        ];

        foreach ($filieres as $nom) {
            Filiere::create([
                'cycle_id' => $premierCycle->id,
                'nom_filiere' => $nom
            ]);
        }
    }
}