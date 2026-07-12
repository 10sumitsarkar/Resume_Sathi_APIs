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
        if (Schema::hasTable('course_categories') && !Schema::hasTable('job_categories')) {
            Schema::rename('course_categories', 'job_categories');
        }

        if (Schema::hasTable('courses') && !Schema::hasTable('jobs')) {
            Schema::rename('courses', 'jobs');
        }

        if (Schema::hasTable('course_contents') && !Schema::hasTable('job_contents')) {
            Schema::rename('course_contents', 'job_contents');
        }

        if (Schema::hasTable('course_attachments') && !Schema::hasTable('job_attachments')) {
            Schema::rename('course_attachments', 'job_attachments');
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('job_categories') && !Schema::hasTable('course_categories')) {
            Schema::rename('job_categories', 'course_categories');
        }

        if (Schema::hasTable('jobs') && !Schema::hasTable('courses')) {
            Schema::rename('jobs', 'courses');
        }

        if (Schema::hasTable('job_contents') && !Schema::hasTable('course_contents')) {
            Schema::rename('job_contents', 'course_contents');
        }

        if (Schema::hasTable('job_attachments') && !Schema::hasTable('course_attachments')) {
            Schema::rename('job_attachments', 'course_attachments');
        }
    }
};
