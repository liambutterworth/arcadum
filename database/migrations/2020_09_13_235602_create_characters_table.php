<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('alignment_id')->nullable()->constrained();
            $table->foreignId('background_id')->nullable()->constrained();
            $table->foreignId('deity_id')->nullable()->constrained();
            $table->foreignId('origin_id')->nullable()->constrained('locations');
            $table->foreignId('race_id')->nullable()->constrained();
            $table->foreignId('user_id')->constrained();
            $table->string('name');
            $table->integer('strength');
            $table->integer('dexterity');
            $table->integer('constitution');
            $table->integer('intelligence');
            $table->integer('wisdom');
            $table->integer('charisma');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
