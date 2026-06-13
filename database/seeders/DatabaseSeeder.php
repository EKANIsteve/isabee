<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cycle;
use App\Models\Filiere;
use App\Models\Specialite;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Vider les tables (sans TRUNCATE pour éviter les contraintes FK)
        Specialite::query()->delete();
        Filiere::query()->delete();
        Cycle::query()->delete();

        // -------------------
        // Cycles
        // -------------------
        $cyclesList = [
            'Premier cycle',
            'Deuxième cycle',
            'Troisième cycle'
        ];

        $cycleModels = [];
        foreach ($cyclesList as $cycleName) {
            $cycleModels[$cycleName] = Cycle::create([
                'nom_cycle' => $cycleName
            ]);
        }

        // -------------------
        // Filières et spécialités pour le premier cycle
        // -------------------
        $filiereData = [
            'Premier cycle' => [
                'Energies Renouvelables' => ['Energies Renouvelables (ENREN)'],
                'Génie de l’Habitat' => ['Génie de l’Habitat (GH)'],
                'Génie Rural' => ['Génie Rural (GR)'],
                'Hydraulique, Sciences et Technologies de l’Eau' => ['Hydraulique, Sciences et Technologies de l’Eau (HSTE)'],
                'Météorologie et Climatologie' => ['Météorologie et Climatologie (MC)'],
                'Agriculture, Elevage et Sciences Halieutiques' => ['Agriculture, Elevage et Sciences Halieutiques (AESH)'],
                'Foresterie, Sciences et Technologies du Bois' => ['Foresterie, Sciences et Technologies du Bois (FSTB)'],
                'Economie, Sociologie Rurale et Vulgarisation Agricole' => ['Economie, Sociologie Rurale et Vulgarisation Agricole (ESVA)'],
                'Sciences de l’Environnement' => ['Sciences de l’Environnement (SE)'],
            ]
        ];

        foreach ($filiereData as $cycleName => $filieres) {
            $cycle = $cycleModels[$cycleName];
            foreach ($filieres as $filiereName => $specialites) {
                $filiere = Filiere::create([
                    'cycle_id' => $cycle->id,
                    'nom_filiere' => $filiereName
                ]);

                foreach ($specialites as $specName) {
                    Specialite::create([
                        'filiere_id' => $filiere->id,
                        'nom_specialite' => $specName
                    ]);
                }
            }
        }
    }
}