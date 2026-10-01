<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('sites')) {
            Schema::table('sites', function (Blueprint $table) {
                if (!Schema::hasColumn('sites', 'portfolio_name')) $table->string('portfolio_name')->nullable();
                if (!Schema::hasColumn('sites', 'province')) $table->string('province')->nullable();
                if (!Schema::hasColumn('sites', 'heating_fuel')) $table->string('heating_fuel')->nullable();
                if (!Schema::hasColumn('sites', 'operating_hours')) $table->string('operating_hours')->nullable();
            });
        }

        if (Schema::hasTable('devices')) {
            Schema::table('devices', function (Blueprint $table) {
                if (!Schema::hasColumn('devices', 'asset_name')) $table->string('asset_name')->nullable();
                if (!Schema::hasColumn('devices', 'source_unit')) $table->string('source_unit', 32)->nullable();
                if (!Schema::hasColumn('devices', 'reading_interval_minutes')) $table->unsignedSmallInteger('reading_interval_minutes')->nullable();
            });
        }

        if (!Schema::hasTable('energy_baselines')) {
            Schema::create('energy_baselines', function (Blueprint $table) {
                $table->id();
                $table->foreignId('site_id')->constrained()->cascadeOnDelete();
                $table->string('name');
                $table->date('period_start');
                $table->date('period_end');
                $table->string('methodology');
                $table->decimal('baseline_kwh', 14, 3)->nullable();
                $table->string('status', 24)->default('draft');
                $table->unsignedBigInteger('created_by')->nullable();
                $table->unsignedBigInteger('approved_by')->nullable();
                $table->timestamp('approved_at')->nullable();
                $table->text('approval_note')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('savings_measures')) {
            Schema::create('savings_measures', function (Blueprint $table) {
                $table->id();
                $table->foreignId('site_id')->constrained()->cascadeOnDelete();
                $table->foreignId('baseline_id')->nullable()->constrained('energy_baselines')->nullOnDelete();
                $table->string('title');
                $table->text('description')->nullable();
                $table->string('stage', 24)->default('identified');
                $table->decimal('estimated_savings_kwh', 14, 3)->nullable();
                $table->decimal('verified_savings_kwh', 14, 3)->nullable();
                $table->decimal('estimated_cost_savings', 14, 2)->nullable();
                $table->char('currency_code', 3)->default('USD');
                $table->text('evidence')->nullable();
                $table->unsignedBigInteger('owner_id')->nullable();
                $table->unsignedBigInteger('verified_by')->nullable();
                $table->timestamp('verified_at')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('recommendations')) {
            Schema::create('recommendations', function (Blueprint $table) {
                $table->id();
                $table->foreignId('site_id')->nullable()->constrained()->nullOnDelete();
                $table->foreignId('device_id')->nullable()->constrained()->nullOnDelete();
                $table->string('title');
                $table->text('description');
                $table->string('priority', 16)->default('medium');
                $table->string('status', 24)->default('open');
                $table->unsignedBigInteger('assigned_to')->nullable();
                $table->date('due_date')->nullable();
                $table->text('completion_note')->nullable();
                $table->timestamp('completed_at')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('onboarding_projects')) {
            Schema::create('onboarding_projects', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->index();
                $table->unsignedBigInteger('site_id')->nullable()->index();
                $table->string('stage', 24)->default('lead');
                $table->text('success_criteria')->nullable();
                $table->unsignedBigInteger('owner_id')->nullable();
                $table->date('target_date')->nullable();
                $table->timestamp('activated_at')->nullable();
                $table->timestamps();
            });
        } else {
            Schema::table('onboarding_projects', function (Blueprint $table) {
                if (!Schema::hasColumn('onboarding_projects', 'user_id')) $table->unsignedBigInteger('user_id')->index();
                if (!Schema::hasColumn('onboarding_projects', 'site_id')) $table->unsignedBigInteger('site_id')->nullable()->index();
                if (!Schema::hasColumn('onboarding_projects', 'stage')) $table->string('stage', 24)->default('lead');
                if (!Schema::hasColumn('onboarding_projects', 'success_criteria')) $table->text('success_criteria')->nullable();
                if (!Schema::hasColumn('onboarding_projects', 'owner_id')) $table->unsignedBigInteger('owner_id')->nullable();
                if (!Schema::hasColumn('onboarding_projects', 'target_date')) $table->date('target_date')->nullable();
                if (!Schema::hasColumn('onboarding_projects', 'activated_at')) $table->timestamp('activated_at')->nullable();
                if (!Schema::hasColumn('onboarding_projects', 'created_at')) $table->timestamps();
            });
        }

        if (!Schema::hasTable('benchmark_versions')) {
            Schema::create('benchmark_versions', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('sector')->nullable();
                $table->string('metric');
                $table->string('unit', 32);
                $table->string('region')->nullable();
                $table->decimal('benchmark_value', 14, 4);
                $table->string('source_citation');
                $table->string('version', 40);
                $table->date('effective_from');
                $table->date('effective_to')->nullable();
                $table->string('status', 20)->default('draft');
                $table->unsignedBigInteger('approved_by')->nullable();
                $table->timestamp('approved_at')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('operational_incidents')) {
            Schema::create('operational_incidents', function (Blueprint $table) {
                $table->id();
                $table->foreignId('site_id')->nullable()->constrained()->nullOnDelete();
                $table->foreignId('device_id')->nullable()->constrained()->nullOnDelete();
                $table->string('title');
                $table->text('description');
                $table->string('severity', 16)->default('medium');
                $table->string('status', 24)->default('open');
                $table->unsignedBigInteger('assigned_to')->nullable();
                $table->timestamp('occurred_at')->useCurrent();
                $table->timestamp('resolved_at')->nullable();
                $table->text('resolution_note')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('integration_health_checks')) {
            Schema::create('integration_health_checks', function (Blueprint $table) {
                $table->id();
                $table->string('integration_name');
                $table->string('integration_type', 40);
                $table->string('status', 24)->default('unknown');
                $table->timestamp('checked_at')->nullable();
                $table->text('details')->nullable();
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('admin_audit_logs')) {
            Schema::create('admin_audit_logs', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('admin_id')->nullable();
                $table->string('entity_type', 80);
                $table->unsignedBigInteger('entity_id')->nullable();
                $table->string('event', 80);
                $table->text('reason')->nullable();
                $table->json('before_values')->nullable();
                $table->json('after_values')->nullable();
                $table->timestamps();
                $table->index(['entity_type', 'entity_id']);
            });
        }

        if (!Schema::hasTable('roles')) {
            Schema::create('roles', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->string('guard_name')->default('web');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('permissions')) {
            Schema::create('permissions', function (Blueprint $table) {
                $table->id();
                $table->string('name')->unique();
                $table->string('guard_name')->default('web');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('role_user')) {
            Schema::create('role_user', function (Blueprint $table) {
                $table->unsignedBigInteger('user_id');
                $table->foreignId('role_id')->constrained()->cascadeOnDelete();
                $table->primary(['user_id', 'role_id']);
                $table->index('user_id');
            });
        }

        if (!Schema::hasTable('permission_role')) {
            Schema::create('permission_role', function (Blueprint $table) {
                $table->foreignId('role_id')->constrained()->cascadeOnDelete();
                $table->foreignId('permission_id')->constrained()->cascadeOnDelete();
                $table->primary(['role_id', 'permission_id']);
            });
        }

        $now = now();
        foreach (['AESORT Admin', 'Energy Analyst', 'Operations Manager', 'Customer User'] as $roleName) {
            DB::table('roles')->updateOrInsert(
                ['name' => $roleName, 'guard_name' => 'web'],
                ['updated_at' => $now, 'created_at' => $now]
            );
        }

        foreach (['sites.view', 'devices.view', 'readings.view', 'baselines.manage', 'savings.verify', 'recommendations.manage', 'onboarding.manage', 'benchmarks.manage', 'incidents.manage', 'reports.export'] as $permissionName) {
            DB::table('permissions')->updateOrInsert(
                ['name' => $permissionName, 'guard_name' => 'web'],
                ['updated_at' => $now, 'created_at' => $now]
            );
        }

        $analystRoleId = DB::table('roles')->where('name', 'Energy Analyst')->value('id');
        foreach (['sites.view', 'devices.view', 'readings.view', 'baselines.manage', 'savings.verify', 'recommendations.manage', 'benchmarks.manage', 'reports.export'] as $permissionName) {
            $permissionId = DB::table('permissions')->where('name', $permissionName)->value('id');
            DB::table('permission_role')->updateOrInsert(['role_id' => $analystRoleId, 'permission_id' => $permissionId]);
        }

        $operationsRoleId = DB::table('roles')->where('name', 'Operations Manager')->value('id');
        foreach (['sites.view', 'devices.view', 'readings.view', 'onboarding.manage', 'recommendations.manage', 'incidents.manage'] as $permissionName) {
            $permissionId = DB::table('permissions')->where('name', $permissionName)->value('id');
            DB::table('permission_role')->updateOrInsert(['role_id' => $operationsRoleId, 'permission_id' => $permissionId]);
        }
    }

    public function down(): void
    {
        foreach (['permission_role', 'role_user', 'permissions', 'roles', 'admin_audit_logs', 'integration_health_checks', 'operational_incidents', 'benchmark_versions', 'onboarding_projects', 'recommendations', 'savings_measures', 'energy_baselines'] as $table) {
            Schema::dropIfExists($table);
        }

        if (Schema::hasTable('devices')) {
            Schema::table('devices', function (Blueprint $table) {
                $columns = ['asset_name', 'source_unit', 'reading_interval_minutes'];
                $existing = array_values(array_filter($columns, fn ($column) => Schema::hasColumn('devices', $column)));
                if ($existing) $table->dropColumn($existing);
            });
        }

        if (Schema::hasTable('sites')) {
            Schema::table('sites', function (Blueprint $table) {
                $columns = ['portfolio_name', 'province', 'heating_fuel', 'operating_hours'];
                $existing = array_values(array_filter($columns, fn ($column) => Schema::hasColumn('sites', $column)));
                if ($existing) $table->dropColumn($existing);
            });
        }
    }
};
