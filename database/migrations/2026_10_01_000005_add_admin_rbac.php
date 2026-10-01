<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('admin_role')) {
            Schema::create('admin_role', function (Blueprint $table) {
                $table->unsignedBigInteger('admin_id');
                $table->unsignedBigInteger('role_id');
                $table->primary(['admin_id', 'role_id']);
                $table->index('admin_id');
                $table->foreign('role_id')->references('id')->on('roles')->cascadeOnDelete();
            });
        }

        $now = now();
        DB::table('roles')->updateOrInsert(
            ['name' => 'AESORT Super Admin', 'guard_name' => 'admin'],
            ['updated_at' => $now, 'created_at' => $now]
        );

        $roleNames = [
            'AESORT Energy Analyst' => ['admin.energy.baselines.manage', 'admin.energy.savings.verify', 'admin.benchmarks.manage', 'admin.reports.export'],
            'AESORT Operations Manager' => ['admin.onboarding.manage', 'admin.recommendations.manage', 'admin.incidents.manage', 'admin.integrations.manage'],
            'AESORT Commercial Manager' => ['admin.pricing.manage', 'admin.billing.view'],
        ];

        foreach ($roleNames as $name => $permissions) {
            DB::table('roles')->updateOrInsert(
                ['name' => $name, 'guard_name' => 'admin'],
                ['updated_at' => $now, 'created_at' => $now]
            );
        }

        $allPermissions = [
            'admin.rollout.view', 'admin.roles.manage', 'admin.energy.baselines.manage', 'admin.energy.savings.verify',
            'admin.benchmarks.manage', 'admin.reports.export', 'admin.onboarding.manage', 'admin.recommendations.manage',
            'admin.incidents.manage', 'admin.integrations.manage', 'admin.pricing.manage', 'admin.billing.view',
        ];
        foreach ($allPermissions as $name) {
            DB::table('permissions')->updateOrInsert(
                ['name' => $name, 'guard_name' => 'admin'],
                ['updated_at' => $now, 'created_at' => $now]
            );
        }

        $superAdminRoleId = DB::table('roles')->where('name', 'AESORT Super Admin')->where('guard_name', 'admin')->value('id');
        foreach (DB::table('permissions')->where('guard_name', 'admin')->pluck('id') as $permissionId) {
            DB::table('permission_role')->updateOrInsert(['role_id' => $superAdminRoleId, 'permission_id' => $permissionId]);
        }

        foreach ($roleNames as $name => $permissions) {
            $roleId = DB::table('roles')->where('name', $name)->where('guard_name', 'admin')->value('id');
            foreach ($permissions as $permissionName) {
                $permissionId = DB::table('permissions')->where('name', $permissionName)->where('guard_name', 'admin')->value('id');
                DB::table('permission_role')->updateOrInsert(['role_id' => $roleId, 'permission_id' => $permissionId]);
            }
        }

        foreach (DB::table('admins')->pluck('id') as $adminId) {
            DB::table('admin_role')->updateOrInsert(['admin_id' => $adminId, 'role_id' => $superAdminRoleId]);
        }
    }

    public function down(): void
    {
        // Retain access assignments on rollback to avoid locking out administrators.
    }
};
