<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('concours', function (Blueprint $table) {

            // 1️⃣ Supprimer la clé étrangère si elle existe
            if (Schema::hasColumn('concours', 'district_id')) {
                $table->dropForeign(['district_id']); // supprime FK
                $table->dropColumn('district_id');    // supprime la colonne
            }

            // 2️⃣ Ajouter centre_examen si besoin
            if (!Schema::hasColumn('concours', 'centre_examen')) {
                $table->string('centre_examen', 255)->after('arrondissement_id')->nullable();
            }
        });
    }

    public function down(): void
    {
        Schema::table('concours', function (Blueprint $table) {
            if (!Schema::hasColumn('concours', 'district_id')) {
                $table->unsignedBigInteger('district_id')->nullable()->after('arrondissement_id');
                // ⚠️ tu peux ajouter FK ici si tu veux
            }

            if (Schema::hasColumn('concours', 'centre_examen')) {
                $table->dropColumn('centre_examen');
            }
        });
    }
};