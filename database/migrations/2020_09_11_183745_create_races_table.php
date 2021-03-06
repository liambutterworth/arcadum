<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRacesTable extends Migration
{
    public function up()
    {
        Schema::create('races', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('races');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('races');
    }
}
