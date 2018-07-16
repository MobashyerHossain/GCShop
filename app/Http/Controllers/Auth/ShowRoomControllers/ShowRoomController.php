<?php

namespace App\Http\Controllers\Auth\ShowRoomStaffControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowRoomStaffController extends Controller
{
    public function index(){
      return view('multiAuth.showroomstaff.pages.home');
    }
}
