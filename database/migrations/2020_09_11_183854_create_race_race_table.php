<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaceRaceTable extends Migration
{
    public function up()
    {
        Schema::create('race_race', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ancestor_id')->constrained('races')->onDelete('cascade');
            $table->foreignId('descendent_id')->constrained('races')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('race_race');
    }
}
