<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeitiesTable extends Migration
{
    public function up()
    {
        Schema::create('deities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deity_pantheon_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('deities');
    }
}
