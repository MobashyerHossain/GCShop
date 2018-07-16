<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartsForCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parts_for_cars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('part')->unsigned();
            $table->foreign('part')->references('id')->on('parts')->onDelete('cascade');
            $table->string('car_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parts_for_cars');
    }
}