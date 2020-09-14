<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterClassArchetypeSpellTable extends Migration
{
    public function up()
    {
        Schema::create('character_class_archetype_spell', function (Blueprint $table) {
            $table->id();
            $table->foreignId('archetype_id')->constrained('character_class_archetypes');
            $table->foreignId('spell_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_class_archetype_spell');
    }
}
