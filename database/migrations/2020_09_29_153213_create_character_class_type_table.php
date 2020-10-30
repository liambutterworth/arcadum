<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterClassTypeTable extends Migration
{
    public function up()
    {
        Schema::create('character_class_type', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained();
            $table->foreignId('class_archetype_id')->nullable()->constrained();
            $table->foreignId('class_type_id')->constrained();
            $table->integer('level');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_class_type');
    }
}
