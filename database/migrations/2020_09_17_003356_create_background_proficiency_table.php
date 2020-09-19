<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackgroundProficiencyTable extends Migration
{
    public function up()
    {
        Schema::create('background_proficiency', function (Blueprint $table) {
            $table->id();
            $table->foreignId('background_id')->constrained();
            $table->foreignId('proficiency_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('background_proficiency');
    }
}
