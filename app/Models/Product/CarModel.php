<?php

namespace App\Models\Product;

use Illuminate\Database\Eloquent\Model;

use App\Models\Product\CarMaker;
use App\Models\Product\Car;

class CarModel extends Model
{
    //getter
    public function getCars(){
        return Car::where('model_id', $this->id)->get();
    }

    public function getMaker(){
        return CarMaker::find($this->maker_id);
    }
}
