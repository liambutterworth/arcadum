<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaceAncestryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('race_ancestry', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ancestor_id')->unsigned();
            $table->foreign('ancestor_id')->references('id')->on('races');
            $table->bigInteger('descendent_id')->unsigned();
            $table->foreign('descendent_id')->references('id')->on('races');
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
        Schema::dropIfExists('race_ancestry');
    }
}
