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
        Schema::table('jobs', function (Blueprint $table) {
            if (!Schema::hasColumn('jobs', 'created_by')) {
                $table->unsignedBigInteger('created_by')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'topic_name')) {
                $table->string('topic_name')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'url_name')) {
                $table->string('url_name')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'meta_title')) {
                $table->string('meta_title')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'meta_description')) {
                $table->text('meta_description')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'meta_keyword')) {
                $table->text('meta_keyword')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'canonical_tag')) {
                $table->string('canonical_tag')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'course_type')) {
                $table->unsignedBigInteger('course_type')->nullable();
            }
            if (!Schema::hasColumn('jobs', 'pageview')) {
                $table->bigInteger('pageview')->default(0);
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('jobs', function (Blueprint $table) {
            if (Schema::hasColumn('jobs', 'created_by')) {
                $table->dropColumn('created_by');
            }
            if (Schema::hasColumn('jobs', 'topic_name')) {
                $table->dropColumn('topic_name');
            }
            if (Schema::hasColumn('jobs', 'url_name')) {
                $table->dropColumn('url_name');
            }
            if (Schema::hasColumn('jobs', 'meta_title')) {
                $table->dropColumn('meta_title');
            }
            if (Schema::hasColumn('jobs', 'meta_description')) {
                $table->dropColumn('meta_description');
            }
            if (Schema::hasColumn('jobs', 'meta_keyword')) {
                $table->dropColumn('meta_keyword');
            }
            if (Schema::hasColumn('jobs', 'canonical_tag')) {
                $table->dropColumn('canonical_tag');
            }
            if (Schema::hasColumn('jobs', 'course_type')) {
                $table->dropColumn('course_type');
            }
            if (Schema::hasColumn('jobs', 'pageview')) {
                $table->dropColumn('pageview');
            }
        });
    }
};
