<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterProficiencyTable extends Migration
{
    public function up()
    {
        Schema::create('character_proficiency', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained();
            $table->foreignId('proficiency_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_proficiency');
    }
}
