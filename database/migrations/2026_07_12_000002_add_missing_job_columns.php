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
        if (Schema::hasTable('jobs') && !Schema::hasColumn('jobs', 'hero_image')) {
            Schema::table('jobs', function (Blueprint $table) {
                $table->string('hero_image')->nullable();
            });
        }

        if (Schema::hasTable('job_attachments')) {
            if (!Schema::hasColumn('job_attachments', 'course_id')) {
                Schema::table('job_attachments', function (Blueprint $table) {
                    $table->unsignedInteger('course_id')->nullable();
                });
            }

            if (!Schema::hasColumn('job_attachments', 'file')) {
                Schema::table('job_attachments', function (Blueprint $table) {
                    $table->string('file')->nullable();
                });
            }

            if (!Schema::hasColumn('job_attachments', 'file_type')) {
                Schema::table('job_attachments', function (Blueprint $table) {
                    $table->integer('file_type')->default(1);
                });
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('jobs') && Schema::hasColumn('jobs', 'hero_image')) {
            Schema::table('jobs', function (Blueprint $table) {
                $table->dropColumn('hero_image');
            });
        }

        if (Schema::hasTable('job_attachments')) {
            if (Schema::hasColumn('job_attachments', 'file_type')) {
                Schema::table('job_attachments', function (Blueprint $table) {
                    $table->dropColumn('file_type');
                });
            }
            if (Schema::hasColumn('job_attachments', 'file')) {
                Schema::table('job_attachments', function (Blueprint $table) {
                    $table->dropColumn('file');
                });
            }
            if (Schema::hasColumn('job_attachments', 'course_id')) {
                Schema::table('job_attachments', function (Blueprint $table) {
                    $table->dropColumn('course_id');
                });
            }
        }
    }
};
