<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassArchetypeFeatureTable extends Migration
{
    public function up()
    {
        Schema::create('class_archetype_feature', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_archetype_id')->constrained();
            $table->foreignId('feature_id')->constrained();
            $table->integer('level');
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_archetype_feature');
    }
}
