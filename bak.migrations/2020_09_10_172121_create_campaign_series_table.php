<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaign_series', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('prequel_id')->unsigned();
            $table->foreign('prequel_id')->references('id')->on('campaigns');
            $table->bigInteger('sequel_id')->unsigned();
            $table->foreign('sequel_id')->references('id')->on('campaigns');
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
        Schema::dropIfExists('campaign_series');
    }
}
