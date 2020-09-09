<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deities', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pantheon_id')->unsigned();
            $table->foreign('pantheon_id')->references('id')->on('pantheons');
            $table->string('name');
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
        Schema::dropIfExists('deities');
    }
}
