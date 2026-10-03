<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        foreach (['sites', 'devices', 'energy_baselines', 'savings_measures', 'recommendations', 'onboarding_projects', 'benchmark_versions', 'operational_incidents', 'integration_health_checks'] as $tableName) {
            if (Schema::hasTable($tableName) && !Schema::hasColumn($tableName, 'is_demo')) {
                Schema::table($tableName, function (Blueprint $table) {
                    $table->boolean('is_demo')->default(false)->index();
                });
            }
        }

        if (Schema::hasTable('recommendations')) {
            Schema::table('recommendations', function (Blueprint $table) {
                if (!Schema::hasColumn('recommendations', 'customer_acknowledged_at')) {
                    $table->timestamp('customer_acknowledged_at')->nullable();
                }
                if (!Schema::hasColumn('recommendations', 'customer_note')) {
                    $table->text('customer_note')->nullable();
                }
            });
        }

        if (Schema::hasTable('operational_incidents')) {
            Schema::table('operational_incidents', function (Blueprint $table) {
                if (!Schema::hasColumn('operational_incidents', 'customer_acknowledged_at')) {
                    $table->timestamp('customer_acknowledged_at')->nullable();
                }
                if (!Schema::hasColumn('operational_incidents', 'customer_note')) {
                    $table->text('customer_note')->nullable();
                }
            });
        }

        if (!Schema::hasTable('customer_value_reports')) {
            Schema::create('customer_value_reports', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->index();
                $table->unsignedBigInteger('site_id')->nullable()->index();
                $table->date('period_start');
                $table->date('period_end');
                $table->string('format', 12)->default('csv');
                $table->string('file_path', 255);
                $table->timestamp('generated_at')->index();
                $table->timestamps();
            });
        }

        DB::table('energy_baselines')->where('name', 'Baseline Q3 2026')->update(['is_demo' => true]);
        DB::table('savings_measures')->where('title', 'LED replacement programme')->update(['is_demo' => true]);
        DB::table('recommendations')->where('title', 'Optimize HVAC schedules')->update(['is_demo' => true]);
        DB::table('onboarding_projects')->where('success_criteria', 'Meter data stable, energy baseline approved, and dashboard aligned to site expectations.')->update(['is_demo' => true]);
        DB::table('benchmark_versions')->where('name', 'Commercial Office Benchmark')->where('version', 'v2026.2')->update(['is_demo' => true]);
        DB::table('operational_incidents')->where('title', 'Weekend HVAC drift')->update(['is_demo' => true]);
        DB::table('integration_health_checks')->where('integration_name', 'Utility Data Sync')->update(['is_demo' => true]);
    }

    public function down(): void
    {
        // Preserve generated report history and customer action evidence on rollback.
    }
};
