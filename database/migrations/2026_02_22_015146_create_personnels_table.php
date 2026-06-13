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
    Schema::create('personnels', function (Blueprint $table) {
        $table->id();
        $table->string('nom');
        $table->string('poste');
        $table->string('photo')->nullable(); // chemin vers la photo
        $table->string('site_web')->nullable();
        $table->string('linkedin')->nullable();
        $table->string('twitter')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnels');
    }
};
