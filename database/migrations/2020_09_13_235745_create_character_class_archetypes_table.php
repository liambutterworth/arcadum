<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterClassArchetypesTable extends Migration
{
    public function up()
    {
        Schema::create('character_class_archetypes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')->constrained('character_classes');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_class_archetypes');
    }
}