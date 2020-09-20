<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOriginsTable extends Migration
{
    public function up()
    {
        Schema::create('origins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('origins');
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('origins');
    }
}
