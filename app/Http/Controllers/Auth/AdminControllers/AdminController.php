<?php

namespace App\Http\Controllers\Auth\AdminControllers;

use App\Models\MultiAuth\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //pages control methods
    public function index(){
      return view('multiAuth.admin.pages.dashboard');
    }

    public function profile(){
      return view('multiAuth.admin.pages.profile');
    }

    //other methods
    public function verifyAccount(){
      return route('index');
    }
}
