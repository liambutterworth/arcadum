<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassFeaturesTable extends Migration
{
    public function up()
    {
        Schema::create('class_features', function (Blueprint $table) {
            $table->id();
            $table->morphs('featurable');
            $table->string('name');
            $table->integer('level_requirement');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_features');
    }
}
