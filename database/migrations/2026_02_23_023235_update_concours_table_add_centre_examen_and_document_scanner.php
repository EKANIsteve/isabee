<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('concours', function (Blueprint $table) {

            // Supprimer district_id si il existe
            if (Schema::hasColumn('concours', 'district_id')) {
                $table->dropForeign(['district_id']); // supprimer FK si existante
                $table->dropColumn('district_id');
            }

            // Ajouter centre_examen si pas existant
            if (!Schema::hasColumn('concours', 'centre_examen')) {
                $table->string('centre_examen', 255)->after('arrondissement_id')->nullable();
            }

            // Ajouter document_scanner si pas existant
            if (!Schema::hasColumn('concours', 'document_scanner')) {
                $table->string('document_scanner', 255)->nullable()->after('photo_etudiant');
            }
        });
    }

    public function down(): void
    {
        Schema::table('concours', function (Blueprint $table) {
            if (!Schema::hasColumn('concours', 'district_id')) {
                $table->unsignedBigInteger('district_id')->nullable()->after('arrondissement_id');
            }

            if (Schema::hasColumn('concours', 'centre_examen')) {
                $table->dropColumn('centre_examen');
            }

            if (Schema::hasColumn('concours', 'document_scanner')) {
                $table->dropColumn('document_scanner');
            }
        });
    }
};