<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->char('title',50);
            $table->text('description');
            $table->unsignedTinyInteger('rooms_num');
            $table->unsignedTinyInteger('beds_num');
            $table->unsignedTinyInteger('bath_num');
            $table->unsignedSmallInteger('meters_size');
            $table->text('address');
            $table->boolean('visible');
            $table->text('img_path');
            $table->unsignedSmallInteger('price_night');
            $table->float('longitude', 10, 8);
            $table->float('latitude', 10, 8);
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
        Schema::dropIfExists('apartments');
    }
}
