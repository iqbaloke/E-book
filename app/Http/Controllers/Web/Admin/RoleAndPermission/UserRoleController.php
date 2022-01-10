<?php

namespace App\Http\Controllers\Web\Admin\RoleAndPermission;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    public function userroleindex(){

        return view('admin.roles and permissions.UserRoles.userRolesindex',[
            'roles' => Role::get(),
            'users' => User::get(),
        ]);
    }
    public function userrolecreate(Request $request){
        $request->validate([
            'email' => 'required|email',
            'role' => 'required|array',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->assignRole($request->role);
        return back();
    }

    public function userroleupdate(Request $request, User $user)
    {
        $user->syncRoles($request->role);
        return back();
    }
}
