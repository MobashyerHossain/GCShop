<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoanInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_infos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('consumer')->unsigned();
            $table->integer('car_id')->unsigned();

            //additional information
            $table->string('proffesion');
            $table->integer('copy_of_national_id')->unsigned()->nullable();
            $table->integer('copy_of_passport')->unsigned()->nullable();
            $table->integer('copy_of_bank_statment')->unsigned()->nullable();
            $table->integer('copy_of_tax_clearence')->unsigned()->nullable();
            $table->integer('additional')->unsigned()->nullable();
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
        Schema::dropIfExists('loan_infos');
    }
}
