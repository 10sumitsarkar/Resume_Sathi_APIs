<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('exam_guide_attachments')) {
            Schema::create('exam_guide_attachments', function (Blueprint $table) {
                $table->id();
                $table->foreignId('exam_guide_id')->constrained('exam_guides')->cascadeOnDelete();
                $table->string('file');
                $table->unsignedTinyInteger('file_type')->default(1);
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_guide_attachments');
    }
};
