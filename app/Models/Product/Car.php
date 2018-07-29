<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

use App\Models\Other\Image;
use App\Models\Product\CarModel;
use App\Models\Product\ProductDetail;

class Car extends Model
{
    //getter
    public function getImage(){
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
}
