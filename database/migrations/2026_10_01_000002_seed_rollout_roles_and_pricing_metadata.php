<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('subscription_plans')) {
            Schema::table('subscription_plans', function (Blueprint $table) {
                if (!Schema::hasColumn('subscription_plans', 'currency_code')) $table->char('currency_code', 3)->default('USD');
                if (!Schema::hasColumn('subscription_plans', 'pricing_status')) $table->string('pricing_status', 20)->default('draft');
                if (!Schema::hasColumn('subscription_plans', 'created_by')) $table->unsignedBigInteger('created_by')->nullable();
                if (!Schema::hasColumn('subscription_plans', 'pricing_approved_by')) $table->unsignedBigInteger('pricing_approved_by')->nullable();
                if (!Schema::hasColumn('subscription_plans', 'pricing_approved_at')) $table->timestamp('pricing_approved_at')->nullable();
            });
        }

        if (Schema::hasTable('subscriptions') && !Schema::hasColumn('subscriptions', 'currency_code')) {
            Schema::table('subscriptions', function (Blueprint $table) {
                $table->char('currency_code', 3)->default('USD');
            });
        }

        if (!Schema::hasTable('roles') || !Schema::hasTable('permissions') || !Schema::hasTable('permission_role')) {
            return;
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

        $rolePermissions = [
            'Energy Analyst' => ['sites.view', 'devices.view', 'readings.view', 'baselines.manage', 'savings.verify', 'recommendations.manage', 'benchmarks.manage', 'reports.export'],
            'Operations Manager' => ['sites.view', 'devices.view', 'readings.view', 'onboarding.manage', 'recommendations.manage', 'incidents.manage'],
        ];

        foreach ($rolePermissions as $roleName => $permissionNames) {
            $roleId = DB::table('roles')->where('name', $roleName)->value('id');
            foreach ($permissionNames as $permissionName) {
                $permissionId = DB::table('permissions')->where('name', $permissionName)->value('id');
                DB::table('permission_role')->updateOrInsert(['role_id' => $roleId, 'permission_id' => $permissionId]);
            }
        }
    }

    public function down(): void
    {
        // Retain pricing and role metadata so rollback cannot orphan production records.
    }
};
