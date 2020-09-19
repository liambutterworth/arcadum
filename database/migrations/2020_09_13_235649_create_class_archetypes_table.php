<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassArchetypesTable extends Migration
{
    public function up()
    {
        Schema::create('class_archetypes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_type_id')->constrained();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_archetypes');
    }
}
