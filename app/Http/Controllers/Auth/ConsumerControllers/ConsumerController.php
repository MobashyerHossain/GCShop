<?php

namespace App\Http\Controllers\Auth\ConsumerControllers;

use App\Models\MultiAuth\Consumer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Product\CarMaker;
use App\Models\Product\Car;
use App\Models\Product\PartCategory;
use App\Models\Product\PartManufacturer;
use App\Models\Product\Part;
use App\Models\Other\Image;
use App\Models\Purchase\ResentView;

class ConsumerController extends Controller
{
    public function profile(){
      return view('multiAuth.consumer.pages.profile');
    }

    public function index(){
      $carmakers = CarMaker::all();
      $partcategories = PartCategory::all();
      $partmanufacturers = PartManufacturer::all();
      $recommendeds = $this->getRecommendation();
      $banner_car = Car::find(19);
      return view('multiAuth.consumer.pages.home')->with(['carmakers' => $carmakers, 'partcategories' => $partcategories, 'partmanufacturers' => $partmanufacturers, 'recommendeds' => $recommendeds, 'banner_car' => $banner_car]);
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

    public function getRecommendation(){
        if(Auth::check()){
            $viewgroups = ResentView::where('consumer_id', Auth::id())->where('product_type','carmodel')->orWhere('product_type','partsubcategory')->orderBy('times_visited','desc')->limit(4)->get();
            if(count($viewgroups) > 0){
                if(count($viewgroups) == 4){
                    $products = array();
                    foreach ($viewgroups as $viewgroup) {
                        $sub = $viewgroup->getProduct();
                        if($sub->getType() == 'carmodel'){
                            $car = Car::where('model_id', $sub->id)->inRandomOrder()->limit(2)->get();
                            array_push($products, $car[0], $car[1]);
                        }
                        else{
                            $part = Part::where('sub_category_id', $sub->id)->inRandomOrder()->limit(2)->get();
                            array_push($products, $part[0], $part[1]);
                        }
                    }

                    shuffle($products);
                    return $products;
                }
                else{
                    $sort = 4 - count($viewgroups);
                    $products = array();
                    foreach ($viewgroups as $viewgroup) {
                        $sub = $viewgroup->getProduct();
                        if($sub->getType() == 'carmodel'){
                            $car = Car::where('model_id', $sub->id)->inRandomOrder()->limit(2)->get();
                            array_push($products, $car[0], $car[1]);
                        }
                        else{
                            $part = Part::where('sub_category_id', $sub->id)->inRandomOrder()->limit(2)->get();
                            array_push($products, $part[0], $part[1]);
                        }
                    }
                    for($i=0; $i<$sort; $i++){
                        if($i%2 == 0){
                          $car = Car::inRandomOrder()->first();
                          array_push($products, $car);
                        }
                        else{
                          $part = Part::inRandomOrder()->first();
                          array_push($products, $part);
                        }
                    }

                    shuffle($products);
                    return $products;
                }
            }
            else{
                return $this->getUnAuthRecommendation();
            }
        }
        else {
            return $this->getUnAuthRecommendation();
        }
    }
}
