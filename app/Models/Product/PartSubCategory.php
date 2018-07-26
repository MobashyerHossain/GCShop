<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product\PartCategory;
use App\Models\Other\Image;

class PartSubCategory extends Model
{
    public function getCategory(){
        return PartCategory::find($this->category_id);
    }

    public function getLogo(){
        if(Image::find($this->image_id)){
          return (Image::find($this->image_id))->uri;
        }
        else{
          return 'storage/Images/tempSubCategory.png';
        }
    }
}
