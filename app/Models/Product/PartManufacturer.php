<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

use App\Models\Other\Image;

class PartManufacturer extends Model
{
    public function getLogo(){
        if(Image::find($this->logo)){
          return (Image::find($this->logo))->uri;
        }
        else{
          return 'storage/Images/tempManufacturerLogo.png';
        }
    }
}
