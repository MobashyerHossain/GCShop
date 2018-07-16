<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('part_sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();           //Ex. Air Filter, Brake Pad etc.
            $table->string('details');                  //Brief intro
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
        Schema::dropIfExists('part_sub_categories');
    }
}
