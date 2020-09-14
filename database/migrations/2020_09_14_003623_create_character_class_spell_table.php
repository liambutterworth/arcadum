<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterClassSpellTable extends Migration
{
    public function up()
    {
        Schema::create('character_class_spell', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('character_classes');
            $table->foreignId('spell_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_class_spell');
    }
}
