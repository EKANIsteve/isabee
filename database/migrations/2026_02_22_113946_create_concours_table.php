<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
      Schema::create('concours', function (Blueprint $table) {
            $table->id();

            // ========================
            // HIERARCHIE FORMATION
            // ========================
            $table->foreignId('cycle_id')->constrained()->cascadeOnDelete();
            $table->foreignId('filiere_id')->constrained()->cascadeOnDelete();
            $table->foreignId('specialite_id')->constrained()->cascadeOnDelete();

            // ========================
            // HIERARCHIE LOCALISATION
            // ========================
            $table->foreignId('pays_id')->constrained()->cascadeOnDelete();
            $table->foreignId('region_id')->constrained()->cascadeOnDelete();
            $table->foreignId('departement_id')->constrained()->cascadeOnDelete();
            $table->foreignId('arrondissement_id')->constrained()->cascadeOnDelete();
            $table->foreignId('district_id')->constrained()->cascadeOnDelete();

            // ========================
            // INFORMATIONS PERSONNELLES
            // ========================
            $table->string('numero_candidat')->unique();
            $table->string('nom_complet');
            $table->date('date_naissance');
            $table->string('lieu_naissance');
            $table->string('numero_nci')->nullable();
            $table->string('sexe')->nullable();
            $table->string('telephone')->nullable();
            $table->string('nationalite')->nullable();
            $table->string('marital')->nullable();
            $table->string('profession')->nullable();
            $table->string('numero_telephone_candidat')->unique();

            // ========================
            // INFORMATIONS PARENTS
            // ========================
            $table->string('nom_pere')->nullable();
            $table->string('numero_telephone_pere')->nullable();
            $table->string('profession_pere')->nullable();

            $table->string('nom_mere')->nullable();
            $table->string('profession_mere')->nullable();
            $table->string('numero_telephone_mere')->nullable();

            $table->string('ville_parents')->nullable();

            // ========================
            // CONTACT URGENCE
            // ========================
            $table->string('Personne_a_contacter_cas_urgent')->nullable();
            $table->string('numero_telephone_Personne_a_contacte_urgent')->nullable();
            $table->string('ville_Personne_a_contacte_cas_urgent')->nullable();

            // ========================
            // DIPLOME / ETUDES
            // ========================
            $table->string('diplome_entre')->nullable();
            $table->string('serie_diplome')->nullable();
            $table->string('annee_obtention_diplome')->nullable();
            $table->string('emetteur_entre_diplome')->nullable();
            $table->string('moyenne_obtenu_diplome')->nullable();
            $table->string('numero_diplome_entre')->nullable();

            // ========================
            // AUTRES INFORMATIONS
            // ========================
            $table->string('sport_pratique')->nullable();
            $table->string('handicape')->nullable();
            $table->string('photo_etudiant')->nullable();

            $table->timestamps();
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('concours');
    }
};
