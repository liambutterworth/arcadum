<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTypeSpellTable extends Migration
{
    public function up()
    {
        Schema::create('class_type_spell', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_type_id')->constrained();
            $table->foreignId('spell_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_type_spell');
    }
}
