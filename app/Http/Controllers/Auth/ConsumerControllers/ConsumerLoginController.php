<?php

namespace App\Http\Controllers\Auth\ConsumerControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class ConsumerLoginController extends Controller
{
    public function __construct(){
      $this->middleware('guest:consumer', ['except' => ['consumerLogout']]);
    }

    public function show(){
      return view('multiAuth.consumer.pages.home');
    }

    public function login(Request $request){
      //validate the form date
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required'
      ]);

      //attept to log the user in
      if (Auth::guard('consumer')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        //if successfull, than redirect to their intended location
        return redirect()->intended(route('consumer.home'));
      }

      //if unsuccessful, than redirect with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function consumerLogout()
    {
        Auth::guard('consumer')->logout();
        return redirect()->route('consumer.login');
    }
}
