<?php

namespace App\Http\Controllers\Auth\ConsumerControllers;

use App\Models\MultiAuth\Consumer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product\CarMaker;
use App\Models\Product\PartCategory;
use App\Models\Product\PartManufacturer;

class ConsumerController extends Controller
{
    public function index(){
      $carmakers = CarMaker::all();
      $partcategories = PartCategory::all();
      $partmanufacturers = PartManufacturer::all();
      return view('multiAuth.consumer.pages.home')->with(['carmakers' => $carmakers, 'partcategories' => $partcategories, 'partmanufacturers' => $partmanufacturers]);
    }

    public function verifyAccount($id){
      $consumer = Consumer::find($id);
      $consumer->verification_status = true;
      $consumer->save();
      return redirect()->route('index')->with('verification_status', 'Account verified. You Can Log In Now!');
    }
}
