<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharacterClassTypeLevelsTable extends Migration
{
    public function up()
    {
        Schema::create('character_class_type_levels', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('type_id')->unsigned();
            $table->foreign('type_id')->references('id')->on('character_class_types');
            $table->integer('level');
            $table->integer('proficiency_bonus');
            $table->integer('cantrips_known')->nullable();
            $table->integer('spells_known')->nullable();
            $table->integer('invocations_known')->nullable();
            $table->integer('rages')->nullable();
            $table->integer('rage_damage_bonus')->nullable();
            $table->integer('ki_point')->nullable();
            $table->integer('unarmored_movement_bonus_ft')->nullable();
            $table->integer('1st_level_spell_slots')->nullable();
            $table->integer('2nd_level_spell_slots')->nullable();
            $table->integer('3rd_level_spell_slots')->nullable();
            $table->integer('4th_level_spell_slots')->nullable();
            $table->integer('5th_level_spell_slots')->nullable();
            $table->integer('6th_level_spell_slots')->nullable();
            $table->integer('7th_level_spell_slots')->nullable();
            $table->integer('9th_level_spell_slots')->nullable();
            $table->string('martial_arts')->nullable();
            $table->string('sneak_attack')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('character_class_type_levels');
    }
}
