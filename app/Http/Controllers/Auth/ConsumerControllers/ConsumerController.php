<?php

namespace App\Http\Controllers\Auth\ConsumerControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConsumerController extends Controller
{
    public function index(){
      return view('multiAuth.consumer.pages.home');
    }
}
