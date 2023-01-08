<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
class AuthController extends Controller
{
    public function index(){
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }
    public function login(Request $request){
        if(Auth::check()){
            return redirect()->route('dashboard');
        }
        $this->validate($request,[
            'email'=>'required',
            'password'=>'required'
        ]);
//        $remember_me = $request->has('remember_me') ? true : false;
        $credentials=$request->only('email','password');
        if(Auth::attempt($credentials)){

                if ($request->user()->hasRole('Admin')){
                    return redirect('admin/home')->with('success','Signed in');
//                    return redirect()->intended('admin/home')->with('success','Signed in');
                }
                if ($request->user()->hasRole('Blog_Admin')){
//                    return $role->role_name;
                    return redirect('blog/home')->with('success','Signed in');
//                    return redirect()->intended('blog/home')->with('success','Signed in');
                }
                    return redirect()->intended('dashboard')->with('success','Signed in');
            }
        return redirect("login")->with('error','Login details are not valid');
    }
    public function registerPage(){
        if(Auth::check()){
            return redirect()->route('dashboard');;
        }
        else{
//            return view('auth.register');
            return view('auth.login');
        }

    }
    public function register(Request $request){
        $this->validate($request,[
            'name'=>'required|required|regex:/^[a-zA-Z- ]+$/',
            'email'=>'required|unique:users,email',
            'password'=>'required|min:8',
        ]);
        User::createUser($request);
        return redirect('dashboard')->with('success','You have signed-in');
    }

    public function dashboard(){
        if(Auth::check()){
//            dd(Auth::user());
//            menuSubmenu('users', 'dashboard');
            return view('user.dashboard',['user'=>Auth::user()]);
        }

        return redirect()->route('login')->with('error','You are not allowed to access');
    }
    public function logOut(){
        Session::flush();
        Auth::logout();
        return redirect('/login/');
    }
}
