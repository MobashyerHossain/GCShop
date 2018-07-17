<?php

namespace App\Http\Controllers\Auth\ConsumerControllers;

use App\Models\MultiAuth\Consumer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsumerController extends Controller
{
    public function index(){
      return view('multiAuth.consumer.pages.home');
    }

    public function verifyAccount($id){
      return $this->id;
      //$consumer = Consumer::find($id);
      //$consumer->verification_status = true;
      //$consumer->save();
      //return redirect()->route('index')->with('verification_status', 'Account verified');
    }
}
