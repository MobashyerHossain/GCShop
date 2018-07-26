<?php

namespace App\Models\Purchase;

use Illuminate\Database\Eloquent\Model;

use App\Models\MultiAuth\Consumer;
use App\Models\MultiAuth\ShowRoom\ShowRoom;
use App\Models\Product\Car;

class TestDriving extends Model
{
    //getter
    public function getConsumer(){
      return Consumer::find('consumer_id');
    }

    public function getConsumer(){
      return Car::find('car_id');
    }

    public function getConsumer(){
      return ShowRoom::find('showroom_id');
    }
}
