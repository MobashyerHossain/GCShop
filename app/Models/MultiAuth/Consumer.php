<?php

namespace App\Models\MultiAuth;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ConsumerResetPasswordNotification;
use Illuminate\Support\Facades\Auth;

use App\Models\Purchase\Cart;
use App\Models\Other\Image;
use App\Models\Product\CarMaker;
use App\Models\Product\Car;
use App\Models\Product\PartCategory;
use App\Models\Product\PartManufacturer;
use App\Models\Product\Part;
use App\Models\Other\Address;
use App\Models\Other\PhoneNumber;
use App\Models\Other\MyFavourite;
use App\Models\Purchase\ResentView;
use App\Models\Purchase\TestDriving;

class Consumer extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'date_of_birth', 'profile_pic',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ConsumerResetPasswordNotification($token));
    }

    public function getFullName(){
        return $this->first_name.' '.$this->last_name;
    }

    public function getProfilePic(){
        if(Image::find($this->profile_pic)){
          return (Image::find($this->profile_pic))->uri;
        }
        else{
          return 'storage/images/temp.png';
        }
    }

    //consumers cart methods
    public function getCartProducts(){
        return Cart::where('consumer_id', $this->id)->where('sold', false)->orderBy('created_at', 'desc')->get();
    }

    public function getTotalAmountProducts(){
        return Cart::where('consumer_id', $this->id)->where('sold', false)->sum('quantity');
    }

    public function getTotalCostPerCart(){
        $carts = Cart::where('consumer_id', $this->id)->where('sold', false)->get();
        $total = 0;

        foreach ($carts as $cart) {
          $total += (double)substr($cart->getTotalPartCost(), 2, -4);
        }
        return '$ '.(number_format((float)$total, 2, '.', '')).' USD';
    }

    public function getAddress(){
        return Address::find($this->address_id);
    }

    public function getPhoneNumber(){
        return PhoneNumber::find($this->phone_number_id);
    }

    public function getMyFavourites(){
        return MyFavourite::where('consumer_id', $this->id)->get();
    }

    public function getMyRecentViewedItems(){
      return ResentView::where('consumer_id', $this->id)->orderBy('created_at', 'desc')->limit(6)->get();
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
