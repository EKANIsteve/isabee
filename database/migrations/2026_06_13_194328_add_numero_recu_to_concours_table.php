<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('concours', 'numero_recu')) {
            Schema::table('concours', function (Blueprint $table) {
                $table->string('numero_recu');
            });
        }

        DB::statement('ALTER TABLE concours ALTER COLUMN numero_recu SET NOT NULL');

        DB::statement('CREATE UNIQUE INDEX IF NOT EXISTS concours_numero_recu_unique ON concours(numero_recu)');
    }

    public function down(): void
    {
        DB::statement('DROP INDEX IF EXISTS concours_numero_recu_unique');

        if (Schema::hasColumn('concours', 'numero_recu')) {
            Schema::table('concours', function (Blueprint $table) {
                $table->dropColumn('numero_recu');
            });
        }
    }
};