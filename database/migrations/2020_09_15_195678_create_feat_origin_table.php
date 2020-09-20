<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatOriginTable extends Migration
{
    public function up()
    {
        Schema::create('feat_origin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('feat_id')->constrained();
            $table->foreignId('origin_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('feat_origin');
    }
}
