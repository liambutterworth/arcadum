<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProficienciesTable extends Migration
{
    public function up()
    {
        Schema::create('proficiencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('proficiency_type_id')->constrained();
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proficiencies');
    }
}
