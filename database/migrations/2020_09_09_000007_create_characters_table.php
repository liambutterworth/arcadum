<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('deity_id')->unsigned()->nullable();
            $table->foreign('deity_id')->references('id')->on('deities');
            $table->bigInteger('race_id')->unsigned();
            $table->foreign('race_id')->references('id')->on('races');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('alignment');
            $table->string('eye_color');
            $table->string('hair_color');
            $table->string('skin_color');
            $table->string('sex');
            $table->integer('age');
            $table->integer('height');
            $table->integer('weight');
            $table->text('blurb');
            $table->text('description');
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
        Schema::dropIfExists('characters');
    }
}
