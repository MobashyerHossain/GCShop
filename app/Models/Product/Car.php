<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

use App\Models\Other\Image;
use App\Models\Product\CarModel;
use App\Models\Product\ProductDetail;
use App\Models\Product\ProductInventory;
use App\Models\Other\MyFavourite;
use Illuminate\Support\Facades\Auth;

class Car extends Model
{
    //getter
    public function getImage(){
        if($this->image_id == 2){
          return $this->getModel()->getImage();
        }
        if(Image::find($this->image_id)){
          return (Image::find($this->image_id))->uri;
        }
        else{
          return 'storage/Images/tempCar.png';
        }
    }

    public function getModel(){
        return CarModel::find($this->model_id);
    }

    public function getDetails(){
        return ProductDetail::where('product_type','part')->where('product_id', $this->id)->get();
    }

    public function getNormalPrice(){
      return '$ '.(number_format((float)$this->selling_price, 2, '.', '')).' USD';
    }

    public function getDiscountedPrice(){
      $price = ($this->selling_price - ($this->current_discount*$this->selling_price));
      return '$ '.(number_format((float)$price, 2, '.', '')).' USD';
    }

    public function getDiscount(){
      return '- '.($this->current_discount*100).' %';
    }

    public function getTotalStock(){
        return ProductInventory::where('product_type', 'car')->where('product_id', $this->id)->sum('quantity');
    }

    public function getInventory(){
        return ProductInventory::where('product_type', 'car')->where('product_id', $this->id)->where('quantity', '>', 0)->orderBy('quantity', 'desc')->get();
    }

    public function getType(){
      return 'car';
    }

    public function isAlreadyFavourited(){
      return MyFavourite::where('product_type', 'car')->where('product_id', $this->id)->where('consumer_id', Auth::id())->first();
    }

    public function getShortedName($len){
      if(strlen($this->name) > $len){
        return substr($this->name, 0, $len).'...';
      }
      else{
        return $this->name;
      }
    }
}
