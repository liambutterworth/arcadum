<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterSpellTable extends Migration
{
    public function up()
    {
        Schema::create('character_spell', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained();
            $table->foreignId('spell_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_spell');
    }
}
