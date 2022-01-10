<?php

namespace App\Http\Controllers\Web\Admin\RoleAndPermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function permissionindex()
    {
        $permissions = Permission::get();
        return view('admin.roles and permissions.Permissions.permission-index', compact('permissions'));
    }

    public function permissioncreate(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Permission::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name ?? 'web',
        ]);

        return back();
    }

    public function permissionupdate(Request $request, Permission $permission)
    {
        $attr = $request->validate([
            'name' => 'required',
        ]);

        $permission->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);
        return back();
    }
    public function permissiondelete(Permission $permission){
        $permission->delete();

        return back();
    }
}
