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
            $table->foreign('consumer')->references('id')->on('consumers')->onDelete('cascade');
            $table->integer('car_id')->unsigned();
            $table->foreign('car_id')->references('id')->on('cars')->onDelete('cascade');

            //additional information
            $table->string('proffesion');
            $table->integer('copy_of_national_id')->unsigned()->nullable();
            $table->foreign('copy_of_national_id')->references('id')->on('images')->onDelete('cascade');
            $table->integer('copy_of_passport')->unsigned()->nullable();
            $table->foreign('copy_of_passport')->references('id')->on('images')->onDelete('cascade');
            $table->integer('copy_of_bank_statment')->unsigned()->nullable();
            $table->foreign('copy_of_bank_statment')->references('id')->on('images')->onDelete('cascade');
            $table->integer('copy_of_tax_clearence')->unsigned()->nullable();
            $table->foreign('copy_of_tax_clearence')->references('id')->on('images')->onDelete('cascade');
            $table->integer('additional')->unsigned()->nullable();
            $table->foreign('additional')->references('id')->on('images')->onDelete('cascade');
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
