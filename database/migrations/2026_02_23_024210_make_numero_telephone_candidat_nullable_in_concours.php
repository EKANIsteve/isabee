<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('concours', function (Blueprint $table) {
            $table->string('numero_telephone_candidat')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('concours', function (Blueprint $table) {
            $table->string('numero_telephone_candidat')->nullable(false)->change();
        });
    }
};