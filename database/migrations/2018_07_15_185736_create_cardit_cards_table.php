<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarditCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cardit_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('card_brand')->nullable();
            $table->string('card_number')->nullable();
            $table->string('card_last_four')->nullable();
            $table->timestamp('trial_ends_at')->nullable();

            //foreign key
            $table->integer('consumer_id')->unsigned();
            $table->foreign('consumer_id')->references('id')->on('consumers')->onDelete('cascade');
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
        Schema::dropIfExists('cardit_cards');
    }
}
