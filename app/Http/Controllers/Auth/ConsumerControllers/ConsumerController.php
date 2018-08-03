<?php

namespace App\Http\Controllers\Auth\ConsumerControllers;

use App\Models\MultiAuth\Consumer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Product\CarMaker;
use App\Models\Product\Car;
use App\Models\Product\PartCategory;
use App\Models\Product\PartManufacturer;
use App\Models\Product\Part;
use App\Models\Other\Image;
use App\Models\Purchase\ResentView;
use Auth;

class ConsumerController extends Controller
{
    public function index(){
      $carmakers = CarMaker::all();
      $partcategories = PartCategory::all();
      $partmanufacturers = PartManufacturer::all();
      $recommendeds = $this->getUnAuthRecommendation();
      $banner = Image::find(15);
      return view('multiAuth.consumer.pages.home')->with(['carmakers' => $carmakers, 'partcategories' => $partcategories, 'partmanufacturers' => $partmanufacturers, 'recommendeds' => $recommendeds, 'banner' => $banner]);
    }

    public function verifyAccount($id){
      $consumer = Consumer::find($id);
      $consumer->verification_status = true;
      $consumer->save();
      return redirect()->route('index')->with('verification_status', 'Account verified. You Can Log In Now!');
    }

    public function getUnAuthRecommendation(){
      $carNo = Car::all()->count();
      $partNo = Part::all()->count();
      $recommendeds = array(
          Car::inRandomOrder()->first(),
          Part::inRandomOrder()->first(),
          Car::inRandomOrder()->first(),
          Part::inRandomOrder()->first(),
          Car::inRandomOrder()->first(),
          Part::inRandomOrder()->first(),
          Car::inRandomOrder()->first(),
          Part::inRandomOrder()->first(),
      );
      shuffle($recommendeds);
      return $recommendeds;
    }
}
