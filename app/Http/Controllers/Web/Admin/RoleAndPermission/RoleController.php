<?php

namespace App\Http\Controllers\Web\Admin\RoleAndPermission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function roleindex()
    {
        $roles = Role::get();
        return view('admin.roles and permissions.Roles.role-index', compact('roles'));
    }

    public function rolecreate(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name ?? 'web',
        ]);

        return back();
    }

    public function roleupdate(Request $request, Role $role)
    {
        $attr = $request->validate([
            'name' => 'required',
        ]);

        $role->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);
        return back();
    }
    public function roledelete(Role $role){
        $role->delete();

        return back();
    }
}
