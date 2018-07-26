<?php

namespace App\Http\Controllers\OtherControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Product\Car;
use App\Models\Product\CarMaker;
use App\Models\Product\Part;
use App\Models\Product\PartSubCategory;
use App\Models\Purchase\ResentView;

class ProductController extends Controller
{
    public function findCar($carId){
        $car = Car::find($carId);
        if ($car) {
            if (Auth::check()) {
                if(ResentView::where('product_type', 'car')->where('product_id', $car->id)->first()){
                  $view = ResentView::where('product_type', 'car')->where('product_id', $car->id)->first();
                  $view->view_count = $view->view_count+1;
                  $view->save();
                }
                else{
                  $view = new ResentView();
                  $view->product_type = 'car';
                  $view->product_id = $car->id;
                  $view->product_group_id = $car->getModel()->getMaker()->id;
                  $view->consumer_id = Auth::id();
                  $view->save();
                }
            }
            return redirect()->route('show.car.details', ['carMakerName' => $car->getModel()->getMaker()->name, 'carModelName' => $car->getModel()->name, 'carName' => $car->name]);
        }
        else{
          return view('error.productNotFound');
        }
    }

    public function findPart($partId){
        $part = Part::find($partId);
        if ($part) {
            if (Auth::check()) {
                if(ResentView::where('product_type', 'part')->where('product_id', $part->id)->first()){
                  $view = ResentView::where('product_type', 'part')->where('product_id', $part->id)->first();
                  $view->view_count = $view->view_count+1;
                  $view->save();
                }
                else{
                  $view = new ResentView();
                  $view->product_type = 'part';
                  $view->product_id = $part->id;
                  $view->product_group_id = $part->getSubCategory()->id;
                  $view->consumer_id = Auth::id();
                  $view->save();
                }
            }
            return redirect()->route('show.part.details', ['partCategoryName' => $part->getSubCategory()->getCategory()->name, 'partSubCategoryName' => $part->getSubCategory()->name, 'partManufacturerName' => $part->getManufacturer()->name, 'partName' => $part->name]);
        }
        else{
          return view('error.productNotFound');
        }
    }

    public function showCar($carMakerName, $carModelName, $carName){
        $car = Car::where('name', $carName)->first();
        if($car){
          return view('multiAuth.consumer.pages.cardetail', ['car' => $car]);
        }
        else{
          return view('error.productNotFound');
        }
    }

    public function showPart($partCategoryName, $partSubCategoryName, $partManufacturerName, $partName){
        $part = Part::where('name', $partName)->first();
        if($part){
          return view('multiAuth.consumer.pages.partdetail', ['part' => $part]);
        }
        else{
          return view('error.productNotFound');
        }
    }
}
