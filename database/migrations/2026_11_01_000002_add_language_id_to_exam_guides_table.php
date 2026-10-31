<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('exam_guides') && !Schema::hasColumn('exam_guides', 'language_id')) {
            Schema::table('exam_guides', function (Blueprint $table) {
                $table->unsignedBigInteger('language_id')->nullable()->after('id');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('exam_guides') && Schema::hasColumn('exam_guides', 'language_id')) {
            Schema::table('exam_guides', function (Blueprint $table) {
                $table->dropColumn('language_id');
            });
        }
    }
};
