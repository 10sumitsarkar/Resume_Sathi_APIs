<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exam_guides', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id')->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->string('canonical_tag')->nullable();
            $table->string('hero_image')->nullable();
            $table->date('application_begin')->nullable();
            $table->date('last_date_for_apply')->nullable();
            $table->boolean('has_admit_card')->default(false);
            $table->boolean('has_answer_key')->default(false);
            $table->boolean('has_result')->default(false);
            $table->unsignedBigInteger('pageview')->default(0);
            $table->boolean('status')->default(true);
            $table->boolean('is_active')->default(true);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->timestamps();
            $table->index(['status', 'is_active']);
        });

        Schema::create('exam_guide_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_guide_id')->constrained('exam_guides')->cascadeOnDelete();
            $table->longText('content')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();
        });

        Schema::create('exam_guide_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_guide_id')->constrained('exam_guides')->cascadeOnDelete();
            $table->string('file');
            $table->unsignedTinyInteger('file_type')->default(1);
            $table->timestamps();
        });

        Schema::create('exam_guide_comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('exam_guide_id')->constrained('exam_guides')->cascadeOnDelete();
            $table->string('name', 100);
            $table->string('email', 150);
            $table->text('text');
            $table->string('user_ip', 45)->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->boolean('is_public')->default(true);
            $table->timestamps();
            $table->index(['exam_guide_id', 'is_public']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_guide_comments');
        Schema::dropIfExists('exam_guide_attachments');
        Schema::dropIfExists('exam_guide_contents');
        Schema::dropIfExists('exam_guides');
        Schema::dropIfExists('exam_guide_categories');
    }
};
