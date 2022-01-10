<?php

namespace App\Http\Controllers\Web\Admin\RoleAndPermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class GivePermissionController extends Controller
{
    public function givepermissionindex()
    {

        return view('admin.roles and permissions.GivePermission.givepermission-index', [
            'roles' => Role::get(),
            'permissions' => Permission::get(),
        ]);
    }
    public function givepermissioncreate(Request $request)
    {

        $request->validate([
            'role' => 'required',
            'permission' => 'array|required',
        ]);

        $role = Role::find($request->role);

        $role->givePermissionTo($request->permission);
        return back();

    }
    public function givepermissionupdate(Request $request, Role $role)
    {
        $request->validate([
            'role' => 'required',
            'permission' => 'array|required',
        ]);

        $role->syncPermissions($request->permission);
        return back();
    }
}
