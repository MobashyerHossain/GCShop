<?php

namespace App\Http\Controllers\Auth;

use App\Models\MultiAuth\Consumer;
use App\Models\MultiAuth\Admin;
use App\Models\MultiAuth\ShowRoomStaff;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request){
      //validate the form date
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required'
      ]);

      //Validate type of user
      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        //if successfull, than redirect to their intended location
        return redirect()->intended(route('admin.home'));
      }
      else if (Auth::guard('showroomstaff')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        //if successfull, than redirect to their intended location
        return redirect()->intended(route('showroomstaff.home'));
      }
      else if (Auth::guard('consumer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        //if successfull, than redirect to their intended location
        return redirect()->intended(route('consumer.home'));
      }
      return redirect()->back()->withInput($request->only('email', 'remember'));

    }
}
