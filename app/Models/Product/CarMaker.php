<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product\CarModel;
use App\Models\Other\Image;

class CarMaker extends Model
{
    //getter
    public function getModels(){
        return CarModel::where('maker_id', $this->id)->get();
    }

    public function getLogo(){
        return (Image::find($this->logo))->uri;
    }
}
