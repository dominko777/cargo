<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loads', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('city_from_id')->unsigned();
            $table->foreign('city_from_id')->references('id')->on('cities');
            $table->bigInteger('city_to_id')->unsigned();
            $table->foreign('city_to_id')->references('id')->on('cities');
            $table->text('name');
            $table->string('volume');
            $table->string('photo');
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
        Schema::dropIfExists('loads');
    }
}
