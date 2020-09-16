<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levels', function (Blueprint $table) {
            $table->id();
            $table->morphs('levelable');
            $table->integer('level');
            $table->integer('proficiency_bonus')->nullable();
            $table->integer('rages')->nullable();
            $table->integer('rage_damage')->nullable();
            $table->integer('cantrips_known')->nullable();
            $table->integer('spells_known')->nullable();
            $table->integer('1st_level_spells')->nullable();
            $table->integer('2nd_level_spells')->nullable();
            $table->integer('3rd_level_spells')->nullable();
            $table->integer('4th_level_spells')->nullable();
            $table->integer('5th_level_spells')->nullable();
            $table->integer('6th_level_spells')->nullable();
            $table->integer('7th_level_spells')->nullable();
            $table->integer('8th_level_spells')->nullable();
            $table->integer('9th_level_spells')->nullable();
            $table->string('martial_arts')->nullable();
            $table->integer('ki_points')->nullable();
            $table->integer('unarmored_movement')->nullable();
            $table->string('sneak_attach')->nullable();
            $table->integer('sorcery_points')->nullable();
            $table->integer('invocations_known')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('levels');
    }
}
