<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
          $table->increments('id');
          $table->string('first_name');
          $table->string('last_name');
          $table->string('email')->unique();
          $table->string('password');

          //foreign keys
          $table->integer('role_id')->unsigned();     //Super Admin, Loan Handler, Accounts Admin
          $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
          $table->integer('address_id')->unsigned()->nullable();
          $table->foreign('address_id')->references('id')->on('addresses')->onDelete('cascade');
          $table->integer('phone_number_id')->unsigned()->nullable();
          $table->foreign('phone_number_id')->references('id')->on('phone_numbers')->onDelete('cascade');
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
        Schema::dropIfExists('admins');
    }
}
