<?php

namespace App\Http\Controllers\OtherControllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Models\Product\Car;

class CarHandlingController extends Controller
{
    //for Booking
    public function findForm($form_type, $car_id){
        $car = Car::find($car_id);
        if(count($car) > 0){
            return redirect()->route('show.carHandling.form', ['form_type' => $form_type, 'car_maker' => $car->getModel()->getMaker()->name, 'car_model' => $car->getModel()->name, 'car_name' => $car->name]);
        }
        else{
            return view('error.productNotFound');
        }
    }

    public function showForm($form_type, $car_maker, $car_model, $car_name){
        $car = Car::where('name', $car_name)->first();
        if(count($car) > 0){
            return view('multiAuth.consumer.pages.carHandling', ['car' => $car]);
        }
        else{
            return view('error.productNotFound');
        }
    }
}
