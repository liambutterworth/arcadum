<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterClassMasterySpellTable extends Migration
{
    public function up()
    {
        Schema::create('character_class_mastery_spell', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mastery_id')->constrained('character_class_masteries');
            $table->foreignId('spell_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_class_mastery_spell');
    }
}
