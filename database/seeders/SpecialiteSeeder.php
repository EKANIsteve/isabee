<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Specialite;
use App\Models\Filiere;

class SpecialiteSeeder extends Seeder
{
    public function run(): void
    {
        Specialite::truncate();

        $filieres = Filiere::all();

        // Pour chaque filière, on ajoute ses spécialités
        foreach ($filieres as $filiere) {
            switch ($filiere->nom_filiere) {
                case 'Energies Renouvelables (ENREN)':
                    $specialites = ['Energies Renouvelables (ENREN)'];
                    break;
                case 'Génie de l’Habitat (GH)':
                    $specialites = ['Génie de l’Habitat (GH)'];
                    break;
                case 'Génie Rural (GR)':
                    $specialites = ['Génie Rural (GR)'];
                    break;
                case 'Hydraulique, Sciences et Technologies de l’Eau (HSTE)':
                    $specialites = ['Hydraulique, Sciences et Technologies de l’Eau (HSTE)'];
                    break;
                case 'Météorologie et Climatologie (MC)':
                    $specialites = ['Météorologie et Climatologie (MC)'];
                    break;
                case 'Agriculture, Elevage et Sciences Halieutiques (AESH)':
                    $specialites = ['Agriculture, Elevage et Sciences Halieutiques (AESH)'];
                    break;
                case 'Foresterie, Sciences et Technologies du Bois (FSTB)':
                    $specialites = ['Foresterie, Sciences et Technologies du Bois (FSTB)'];
                    break;
                case 'Economie, Sociologie Rurale et Vulgarisation Agricole (ESVA)':
                    $specialites = ['Economie, Sociologie Rurale et Vulgarisation Agricole (ESVA)'];
                    break;
                case 'Sciences de l’Environnement (SE)':
                    $specialites = ['Sciences de l’Environnement (SE)'];
                    break;
                default:
                    $specialites = [];
            }

            foreach ($specialites as $nom) {
                Specialite::create([
                    'filiere_id' => $filiere->id,
                    'nom_specialite' => $nom
                ]);
            }
        }
    }
}