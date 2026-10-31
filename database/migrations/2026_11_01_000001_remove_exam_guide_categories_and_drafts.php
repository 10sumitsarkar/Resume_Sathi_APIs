<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('exam_guides')) {
            Schema::table('exam_guides', function (Blueprint $table) {
                if (Schema::hasColumn('exam_guides', 'category_id')) {
                    $table->dropForeign(['category_id']);
                    $table->dropColumn('category_id');
                }
                if (Schema::hasColumn('exam_guides', 'is_draft')) {
                    $table->dropIndex('exam_guides_status_is_active_is_draft_index');
                    $table->dropColumn('is_draft');
                }
            });
        }

        Schema::dropIfExists('exam_guide_categories');

        if (!Schema::hasTable('exam_guide_comments')) {
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
    }

    public function down(): void
    {
        Schema::dropIfExists('exam_guide_comments');

        if (!Schema::hasTable('exam_guide_categories')) {
            Schema::create('exam_guide_categories', function (Blueprint $table) {
                $table->id();
                $table->string('course_name');
                $table->string('course_url')->unique();
                $table->text('description')->nullable();
                $table->boolean('is_active')->default(true);
                $table->timestamps();
            });
        }

        if (Schema::hasTable('exam_guides')) {
            Schema::table('exam_guides', function (Blueprint $table) {
                if (!Schema::hasColumn('exam_guides', 'category_id')) {
                    $table->foreignId('category_id')->nullable()->constrained('exam_guide_categories')->nullOnDelete();
                }
                if (!Schema::hasColumn('exam_guides', 'is_draft')) {
                    $table->boolean('is_draft')->default(false);
                }
            });
        }
    }
};
