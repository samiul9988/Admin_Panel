<?php

namespace App\Http\Controllers\BlogAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('blog_admin.index');
    }
}
