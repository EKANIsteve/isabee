<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pays;
use App\Models\Region;

class RegionSeeder extends Seeder
{
    public function run(): void
    {
        $cameroun = Pays::where('nom_pays', 'Cameroun')->first();

        $regions = [
            'Adamaoua',
            'Centre',
            'Est',
            'Extrême-Nord',
            'Littoral',
            'Nord',
            'Nord-Ouest',
            'Ouest',
            'Sud',
            'Sud-Ouest'
        ];

        foreach ($regions as $region) {
            Region::create([
                'pays_id' => $cameroun->id,
                'nom_region' => $region
            ]);
        }
    }
}