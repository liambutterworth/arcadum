<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesInstallmentsTable extends Migration
{
    public function up()
    {
        Schema::create('series_installments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('campaign_id')->constrained()->onDelete('cascade');
            $table->foreignId('series_id')->constrained()->onDelete('cascade');
            $table->integer('index');
        });
    }

    public function down()
    {
        Schema::dropIfExists('series_installments');
    }
}
