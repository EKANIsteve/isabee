<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('concours', function (Blueprint $table) {
            if (!Schema::hasColumn('concours', 'type_handicap')) {
                $table->string('type_handicap')->nullable()->after('handicape');
            }

            // Pour bloquer le candidat après une seule modification
            if (!Schema::hasColumn('concours', 'candidate_edit_count')) {
                $table->unsignedTinyInteger('candidate_edit_count')->default(0)->after('document_scanner');
            }

            if (!Schema::hasColumn('concours', 'candidate_edited_at')) {
                $table->timestamp('candidate_edited_at')->nullable()->after('candidate_edit_count');
            }

            // Pour savoir quel admin a modifié
            if (!Schema::hasColumn('concours', 'admin_edited_by')) {
                $table->foreignId('admin_edited_by')->nullable()->after('candidate_edited_at')->constrained('users')->nullOnDelete();
            }

            if (!Schema::hasColumn('concours', 'admin_edited_at')) {
                $table->timestamp('admin_edited_at')->nullable()->after('admin_edited_by');
            }
        });
    }

    public function down(): void
    {
        Schema::table('concours', function (Blueprint $table) {
            if (Schema::hasColumn('concours', 'type_handicap')) {
                $table->dropColumn('type_handicap');
            }

            if (Schema::hasColumn('concours', 'candidate_edit_count')) {
                $table->dropColumn('candidate_edit_count');
            }

            if (Schema::hasColumn('concours', 'candidate_edited_at')) {
                $table->dropColumn('candidate_edited_at');
            }

            if (Schema::hasColumn('concours', 'admin_edited_by')) {
                $table->dropConstrainedForeignId('admin_edited_by');
            }

            if (Schema::hasColumn('concours', 'admin_edited_at')) {
                $table->dropColumn('admin_edited_at');
            }
        });
    }
};