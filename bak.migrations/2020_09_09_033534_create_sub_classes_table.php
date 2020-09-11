<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_classes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('base_class_id')->unsigned();
            $table->foreign('base_class_id')->references('id')->on('base_classes');
            $table->string('name');
            $table->text('blurb');
            $table->text('description');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_classes');
    }
}
