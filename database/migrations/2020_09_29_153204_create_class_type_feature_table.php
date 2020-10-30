<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTypeFeatureTable extends Migration
{
    public function up()
    {
        Schema::create('class_type_feature', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_type_id')->constrained();
            $table->foreignId('feature_id')->constrained();
            $table->integer('level');
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_type_feature');
    }
}
