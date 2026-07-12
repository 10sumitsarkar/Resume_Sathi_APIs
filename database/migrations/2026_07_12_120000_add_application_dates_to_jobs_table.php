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
        if (Schema::hasTable('jobs')) {
            Schema::table('jobs', function (Blueprint $table) {
                if (!Schema::hasColumn('jobs', 'application_begin')) {
                    $table->date('application_begin')->nullable();
                }
                if (!Schema::hasColumn('jobs', 'last_date_for_apply')) {
                    $table->date('last_date_for_apply')->nullable();
                }
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('jobs')) {
            Schema::table('jobs', function (Blueprint $table) {
                if (Schema::hasColumn('jobs', 'last_date_for_apply')) {
                    $table->dropColumn('last_date_for_apply');
                }
                if (Schema::hasColumn('jobs', 'application_begin')) {
                    $table->dropColumn('application_begin');
                }
            });
        }
    }
};
