<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterClassArchetypeLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('character_class_archetype_levels', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('archetype_id')->unsigned();
            $table->foreign('archetype_id')->references('id')->on('character_class_archetypes');
            $table->integer('level');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_class_archetype_levels');
    }
}
