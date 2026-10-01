<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EnsureAdminPermission
{
    public function handle(Request $request, Closure $next, string $permission)
    {
        $adminId = Auth::guard('admin')->id();
        abort_unless($adminId, 401);

        $allowed = DB::table('admin_role')
            ->join('roles', 'roles.id', '=', 'admin_role.role_id')
            ->join('permission_role', 'permission_role.role_id', '=', 'roles.id')
            ->join('permissions', 'permissions.id', '=', 'permission_role.permission_id')
            ->where('admin_role.admin_id', $adminId)
            ->where('roles.guard_name', 'admin')
            ->where('permissions.guard_name', 'admin')
            ->where('permissions.name', $permission)
            ->exists();

        abort_unless($allowed, 403, 'You do not have permission to perform this action.');

        return $next($request);
    }
}
