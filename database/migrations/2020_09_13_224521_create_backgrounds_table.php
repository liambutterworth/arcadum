<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBackgroundsTable extends Migration
{
    public function up()
    {
        Schema::create('backgrounds', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('backgroundable');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('backgrounds');
    }
}
