<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExportNeonData extends Command
{
    protected $signature = 'export:neon';
    protected $description = 'Export Neon database data to local files';

    public function handle()
    {
        $this->info("Starting export from Neon...");

        // =========================
        // 1. CONNECT TO NEON DB
        // =========================
        $connection = DB::connection('pgsql');

        // =========================
        // 2. TABLES TO EXPORT
        // =========================
        $tables = [
            'etudiants',
            'inscription_ues',
            'ues',
            'examens',
            'anonymats',
            'anonymat_rattrapages',
            'ccs',
        ];

        $export = [];

        foreach ($tables as $table) {

            if (! $connection->getSchemaBuilder()->hasTable($table)) {
                $this->warn("Table missing: $table");
                continue;
            }

            $data = $connection->table($table)->get();

            $export[$table] = $data;

            // CSV export
            $csvPath = storage_path("app/export_{$table}.csv");

            if ($data->count() > 0) {
                $fp = fopen($csvPath, 'w');

                // headers
                fputcsv($fp, array_keys((array)$data->first()));

                foreach ($data as $row) {
                    fputcsv($fp, (array)$row);
                }

                fclose($fp);
            }

            $this->info("Exported: $table");
        }

        // =========================
        // 3. JSON FULL EXPORT
        // =========================
        $jsonPath = storage_path('app/export_neon_full.json');
        file_put_contents($jsonPath, json_encode($export, JSON_PRETTY_PRINT));

        $this->info("Export completed successfully!");
        $this->info("JSON: " . $jsonPath);

        return Command::SUCCESS;
    }
}