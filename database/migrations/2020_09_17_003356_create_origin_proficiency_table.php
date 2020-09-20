<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOriginProficiencyTable extends Migration
{
    public function up()
    {
        Schema::create('origin_proficiency', function (Blueprint $table) {
            $table->id();
            $table->foreignId('origin_id')->constrained();
            $table->foreignId('proficiency_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('origin_proficiency');
    }
}
