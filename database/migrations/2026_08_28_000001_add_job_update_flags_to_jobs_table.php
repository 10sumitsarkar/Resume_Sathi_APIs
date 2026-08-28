<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('jobs')) {
            return;
        }

        Schema::table('jobs', function (Blueprint $table) {
            if (!Schema::hasColumn('jobs', 'has_admit_card')) {
                $table->boolean('has_admit_card')->default(false)->after('last_date_for_apply');
            }
            if (!Schema::hasColumn('jobs', 'has_answer_key')) {
                $table->boolean('has_answer_key')->default(false)->after('has_admit_card');
            }
            if (!Schema::hasColumn('jobs', 'has_result')) {
                $table->boolean('has_result')->default(false)->after('has_answer_key');
            }
        });
    }

    public function down(): void
    {
        if (!Schema::hasTable('jobs')) {
            return;
        }

        Schema::table('jobs', function (Blueprint $table) {
            foreach (['has_result', 'has_answer_key', 'has_admit_card'] as $column) {
                if (Schema::hasColumn('jobs', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
