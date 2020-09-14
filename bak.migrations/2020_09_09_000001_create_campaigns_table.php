<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('prequel_id')->unsigned()->nullable();
            $table->foreign('prequel_id')->references('id')->on('campaigns');
            $table->bigInteger('sequel_id')->unsigned()->nullable();
            $table->foreign('sequel_id')->references('id')->on('campaigns');
            $table->string('name');
            $table->text('description');
            $table->string('scheduled_interval');
            $table->string('scheduled_timezone');
            $table->dateTime('scheduled_at');
            $table->dateTime('started_at');
            $table->dateTime('finished_at')->nullable();
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
        Schema::dropIfExists('campaigns');
    }
}
