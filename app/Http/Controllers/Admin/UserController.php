<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(){
        menuSubmenu('users', 'allUsers');
        return view('admin.user.index',['users'=>User::all()]);
    }
    public function show($id){
        menuSubmenu('users', 'allUsers');
        return view('admin.user.view',['user'=>User::find($id)]);
    }
    public function create(){
        menuSubmenu('users', 'createUser');
        return view('admin.user.create');
    }
    public function store(Request $request){
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:8',
        ]);
        User::createUser($request);
        menuSubmenu('users', 'createUser');
        return redirect('/admin/user-create')->with('success','Successfully User Created');
    }
    public function edit($id){
        menuSubmenu('users', 'allUsers');
        return view('admin.user.edit',['user'=>User::find($id)]);
    }
    public function update(Request $request, $id){
//        return $request->all();
        $this->validate($request,[
            'name'=>'required|string',
            'email'=>Rule::unique('users')->ignore(User::find($id)),
        ]);
//                return $request->all();
        User::updateUser($request, $id);
        menuSubmenu('users', 'allUsers');
        return redirect('/admin/user')->with('success','Successfully User Updated');
    }
    public function changePassword(Request $request, $id){
        $user=User::find($id);
            $this->validate($request,[
                'password'=>'required|confirmed|min:6',
                'password_confirmation' => 'required| min:6'
            ]);
        User::changePassword($request, $id);
        menuSubmenu('users', 'allUsers');
        return redirect('/admin/user')->with('success','Successfully Password Updated');
//        menuSubmenu('users', 'createUser');
//        return redirect('/admin/user-create')->with('success','Password Does Not Match');
    }
    public function delete($id){
        User::deleteUser($id);
        menuSubmenu('users', 'allUsers');
        return redirect('/admin/user')->with('success','Successfully Password Updated');
    }

    public function employee($employeeId){
//        dd($employeeId);
        menuSubmenu('employees', 'allEmployees');
        return view('admin.employee.index',['employee'=>Employee::find($employeeId)]);
    }
}
