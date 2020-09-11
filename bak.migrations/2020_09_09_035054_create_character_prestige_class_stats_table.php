<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterPrestigeClassStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('character_prestige_class_stats', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('character_id')->unsigned();
            $table->foreign('character_id')->references('id')->on('characters');
            $table->bigInteger('prestige_class_id')->unsigned();
            $table->foreign('prestige_class_id')->references('id')->on('prestige_classes');
            $table->integer('level');
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
        Schema::dropIfExists('character_prestige_class_stats');
    }
}
