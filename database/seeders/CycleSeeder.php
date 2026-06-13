<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cycle;

class CycleSeeder extends Seeder
{
    public function run(): void
    {
        Cycle::truncate();

        $cycles = [
            'Premier cycle',   // Première année, Licence ou Ingénieur
            'Deuxième cycle',  // Master
            
        ];

        foreach ($cycles as $nom) {
            Cycle::create(['nom_cycle' => $nom]);
        }
    }
}