<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignCharacterTable extends Migration
{
    public function up()
    {
        Schema::create('campaign_character', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained();
            $table->foreignId('character_id')->constrained();
        });
    }

    public function down()
    {
        Schema::dropIfExists('campaign_character');
    }
}
