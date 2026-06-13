<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('concours', function (Blueprint $table) {
            $table->string('langue_composition')->nullable()->after('numero_telephone_candidat');
        });
    }

    public function down(): void
    {
        Schema::table('concours', function (Blueprint $table) {
            $table->dropColumn('langue_composition');
        });
    }
};