<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_manufacturers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('details');
            $table->integer('logo')->unsigned()->nullable();
            $table->foreign('logo')->references('id')->on('images')->onDelete('cascade');
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
        Schema::dropIfExists('part_manufacturers');
    }
}
