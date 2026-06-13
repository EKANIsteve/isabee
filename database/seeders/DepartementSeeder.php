<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Region;
use App\Models\Departement;

class DepartementSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            'Adamaoua' => [
                'Djérem',
                'Faro-et-Déo',
                'Mayo-Banyo',
                'Mbéré',
                'Vina'
            ],

            'Centre' => [
                'Haute-Sanaga',
                'Lekié',
                'Mbam-et-Inoubou',
                'Mbam-et-Kim',
                'Méfou-et-Afamba',
                'Méfou-et-Akono',
                'Mfoundi',
                'Nyong-et-Kéllé',
                'Nyong-et-Mfoumou',
                'Nyong-et-So\'o'
            ],

            'Est' => [
                'Boumba-et-Ngoko',
                'Haut-Nyong',
                'Kadey',
                'Lom-et-Djerem'
            ],

            'Extrême-Nord' => [
                'Diamaré',
                'Logone-et-Chari',
                'Mayo-Danay',
                'Mayo-Kani',
                'Mayo-Sava',
                'Mayo-Tsanaga'
            ],

            'Littoral' => [
                'Moungo',
                'Nkam',
                'Sanaga-Maritime',
                'Wouri'
            ],

            'Nord' => [
                'Bénoué',
                'Faro',
                'Mayo-Louti',
                'Mayo-Rey'
            ],

            'Nord-Ouest' => [
                'Boyo',
                'Bui',
                'Donga-Mantung',
                'Menchum',
                'Mezam',
                'Momo',
                'Ngoketunjia'
            ],

            'Ouest' => [
                'Bamboutos',
                'Haut-Nkam',
                'Hauts-Plateaux',
                'Koung-Khi',
                'Menoua',
                'Mifi',
                'Ndé',
                'Noun'
            ],

            'Sud' => [
                'Dja-et-Lobo',
                'Mvila',
                'Océan',
                'Vallée-du-Ntem'
            ],

            'Sud-Ouest' => [
                'Fako',
                'Koupe-Manengouba',
                'Lebialem',
                'Manyu',
                'Meme',
                'Ndian'
            ]
        ];

        foreach ($data as $regionName => $departements) {

            $region = Region::where('nom_region', $regionName)->first();

            foreach ($departements as $dep) {
                Departement::create([
                    'region_id' => $region->id,
                    'nom_departement' => $dep
                ]);
            }
        }
    }
}