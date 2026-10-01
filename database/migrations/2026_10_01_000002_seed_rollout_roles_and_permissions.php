<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
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
        // Keep role and permission catalog data for assigned users.
    }
};
