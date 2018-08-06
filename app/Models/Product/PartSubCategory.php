<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product\PartCategory;
use App\Models\Product\Part;
use App\Models\Other\Image;

class PartSubCategory extends Model
{
    public function getCategory(){
        return PartCategory::find($this->category_id);
    }

    public function getImage(){
        if(Image::find($this->image_id)){
          return (Image::find($this->image_id))->uri;
        }
        else{
          return 'storage/Images/tempSubCategory.png';
        }
    }

    public function getParts(){
        return Part::where('sub_category_id', $this->id)->get();
    }

    public function getType(){
      return 'partsubcategory';
    }
}
