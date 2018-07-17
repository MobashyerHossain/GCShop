_id<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShowRoomStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_room_staffs', function (Blueprint $table) {
          $table->increments('id');
          $table->string('first_name');
          $table->string('last_name');
          $table->string('email')->unique();
          $table->string('password');
          $table->boolean('verification_status')->default(false);

          //foreign keys
          $table->integer('profile_pic')->unsigned()->nullable();
          $table->integer('role_id')->unsigned();     //Sells Manager, Showroom Manager, Worker
          $table->integer('showroom_id')->unsigned();
          $table->integer('address_id')->unsigned()->nullable();
          $table->integer('phone_number_id')->unsigned()->nullable();
          $table->rememberToken();
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
        Schema::dropIfExists('show_room_staffs');
    }
}
