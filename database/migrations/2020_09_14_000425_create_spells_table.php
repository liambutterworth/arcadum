<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpellsTable extends Migration
{
    public function up()
    {
        Schema::create('spells', function (Blueprint $table) {
            $table->id();
            $table->foreignId('spell_school_id')->constrained();
            $table->foreignId('spell_type_id')->constrained();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('spells');
    }
}
