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
use App\Models\Other\PhoneNumber;
use App\Models\Other\Address;

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

    public function update(Request $request, $id){
        $this->validate($request, [
          'first_name' => 'required|max:100',
          'last_name' => 'required|max:100',
          'profile_email' => 'email|required|max:100',
          'date_of_birth' => 'required',
          'local_address' => 'required|max:199',
          'phone_number' => 'required|max:30',
          'postal_code' => 'required|max:4',
          'city' => 'required|max:20',
          'country' => 'required|max:20',
        ]);

        $consumer = Consumer::find($id);
        $consumer->first_name = $request->input('first_name');
        $consumer->last_name = $request->input('last_name');
        $consumer->email = $request->input('profile_email');
        $consumer->date_of_birth = $request->input('date_of_birth');
        $consumer->save();

        if($consumer->address_id){
          $address = Address::find($consumer->address_id);
          $address->local = $request->input('local_address');
          $address->postal_code = $request->input('postal_code');
          $address->city = $request->input('city');
          $address->country = $request->input('country');
          $address->save();
        }
        else {
          $address = new Address();
          $address->local = $request->input('local_address');
          $address->postal_code = $request->input('postal_code');
          $address->city = $request->input('city');
          $address->country = $request->input('country');
          $address->save();
          $consumer->address_id = $address->id;
          $consumer->save();
        }

        if($consumer->phone_number_id){
          $phone = PhoneNumber::find($consumer->phone_number_id);
          $phone->number = $request->input('phone_number');
          $phone->save();
        }
        else {
          $phone = new PhoneNumber();
          $phone->number = $request->input('phone_number');
          $phone->save();
          $consumer->phone_number_id = $phone->id;
          $consumer->save();
        }
        
        return redirect()->back();
    }
}
