<?php

namespace App\Http\Controllers\Auth;

use App\Models\MultiAuth\Consumer;
use App\Models\MultiAuth\Admin;
use App\Models\MultiAuth\ShowRoomStaff;
use App\Http\Controllers\Auth\ConsumerControllers\ConsumerLoginController;
use App\Http\Controllers\Auth\AdminControllers\AdminLoginController;
use App\Http\Controllers\Auth\ShowRoomStaffControllers\ShowRoomStaffLoginController;
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
      if (Admin::where('email', $request->Input('email'))->first()) {
        //if successfull, tha0n redirect to Admin Dashboard
        return (new AdminLoginController)->login($request);
      }
      else if (ShowRoomStaff::where('email', $request->Input('email'))->first()) {
        //if successfull, than redirect to ShowRoomStaff Dashboard
        return (new ShowRoomStaffLoginController)->login($request);
      }
      else if (Consumer::where('email', $request->Input('email'))->first()) {
        $consumer = Consumer::where('email', $request->Input('email'))->first();
        if ($consumer->verification_status == 0) {
          return redirect()->route('index')->with('not_verified', 'Your Account is still not verified. Please follow the link in your email to verify your Account.');
        }
        //if successfull, than redirect to Consumer Dashboard
        return (new ConsumerLoginController)->login($request);
      }
      return redirect()->back()->withInput($request->only('email', 'remember'));

    }
}
