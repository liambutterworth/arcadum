<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassTypesTable extends Migration
{
    public function up()
    {
        Schema::create('class_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // $table->string('required_abilities')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_types');
    }
}
