<?php

namespace App\Http\Controllers\Auth\AdminControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
      return view('multiAuth.admin.pages.home');
    }
}
