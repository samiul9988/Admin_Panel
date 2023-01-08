<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function allUser(){
        return view('admin.user-role.index',['users'=>User::all()]);
    }
    public function assignRole(Request $request){
//        return $request->all();
        Role::newRole($request);
        menuSubmenu('roles', 'assignRole');
        return redirect('/admin/assign-role')->with('success','successfully adder role');
    }
    public function userRole(){
        menuSubmenu('roles', 'assignRole');
        return view('admin.user-role.assign',[
            'users'=>User::all(),
        ]);
    }
    public function manageRole(){
        menuSubmenu('roles', 'allRoles');
        return view('admin.user-role.role_manage',['roles'=>Role::where('role_name','Admin')->orwhere('role_name','Blog_Admin')->get()]);
    }
    public function editRole($id){
        menuSubmenu('roles', 'allRoles');
        return view('admin.user-role.edit',[
            'role'=>Role::find($id),
            'users'=>User::all()
            ]);
    }
    public function updateRole(Request $request,$id){
//        return $request->all();
        Role::updateRole($request,$id);
        menuSubmenu('roles', 'allRoles');
        return redirect('/admin/manage-role')->with('success','Successfully Updated');
    }
    public function deleteRole($id){
        Role::deleteRole($id);
        menuSubmenu('roles', 'allRoles');
        return redirect('/admin/manage-role')->with('success','Successfully Deleted');
    }

}
