<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('exam_guide_attachments') && !Schema::hasColumn('exam_guide_attachments', 'name')) {
            Schema::table('exam_guide_attachments', function (Blueprint $table) {
                $table->string('name')->nullable()->after('file');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('exam_guide_attachments') && Schema::hasColumn('exam_guide_attachments', 'name')) {
            Schema::table('exam_guide_attachments', function (Blueprint $table) {
                $table->dropColumn('name');
            });
        }
    }
};
