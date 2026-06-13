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
                $table->string('role')->default('viewer')->after('email');
            });
        } else {
            DB::statement("ALTER TABLE users MODIFY role VARCHAR(255) NOT NULL DEFAULT 'viewer'");
        }
    }

    public function down(): void
    {
        // On ne supprime pas la colonne role parce qu'elle existait déjà dans ta base.
        // Si tu veux vraiment la supprimer plus tard, fais-le manuellement.
    }
};