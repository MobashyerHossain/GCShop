<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

use App\Models\Other\Image;
use App\Models\Product\PartSubCategory;
use App\Models\Product\PartManufacturer;
use App\Models\Product\ProductDetail;
use App\Models\Product\PartsForCar;

class Part extends Model
{
    //getter
    public function getPhoto(){
        if(Image::find($this->image_id)){
          return (Image::find($this->image_id))->uri;
        }
        else{
          return 'storage/Images/tempPart.png';
        }
    }

    public function getSubCategory(){
        return PartSubCategory::find($this->sub_category_id);
    }

    public function getManufacturer(){
        return PartManufacturer::find($this->manufacturer_id);
    }

    public function getDetails(){
        return ProductDetail::where('product_type','part')->where('product_id', $this->id)->get();
    }

    public function getForWhichCar(){
        return PartsForCar::where('part_id', $this->id)->get();
    }
}
