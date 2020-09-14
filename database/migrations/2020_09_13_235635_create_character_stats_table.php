<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterStatsTable extends Migration
{
    public function up()
    {
        Schema::create('character_stats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained();
            $table->integer('strength');
            $table->integer('dexterity');
            $table->integer('constitution');
            $table->integer('intelligence');
            $table->integer('wisdom');
            $table->integer('charisma');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_stats');
    }
}
