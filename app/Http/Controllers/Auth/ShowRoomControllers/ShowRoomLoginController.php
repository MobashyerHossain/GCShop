<?php

namespace App\Http\Controllers\Auth\ShowRoomStaffControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ShowRoomStaffLoginController extends Controller
{
    public function __construct(){
      $this->middleware('guest:showroomstaff', ['except' => ['showroomstaffLogout']]);
    }

    public function show(){
      return view('multiAuth.showroomstaff.pages.login');
    }

    public function login(Request $request){
      //validate the form date
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required'
      ]);

      //attept to log the user in
      if (Auth::guard('showroomstaff')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        //if successfull, than redirect to their intended location
        return redirect()->intended(route('showroomstaff.home'));
      }

      //if unsuccessful, than redirect with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function showroomstaffLogout()
    {
        Auth::guard('showroomstaff')->logout();
        return redirect()->route('showroomstaff.login');
    }
}
