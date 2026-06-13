<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('users', 'role')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('role')->default('viewer');
            });
        } else {
            DB::statement("UPDATE users SET role = 'viewer' WHERE role IS NULL");
            DB::statement("ALTER TABLE users ALTER COLUMN role TYPE VARCHAR(255)");
            DB::statement("ALTER TABLE users ALTER COLUMN role SET DEFAULT 'viewer'");
            DB::statement("ALTER TABLE users ALTER COLUMN role SET NOT NULL");
        }
    }

    public function down(): void
    {
        // On ne supprime pas la colonne role,
        // car elle existe déjà dans une ancienne migration.
    }
};