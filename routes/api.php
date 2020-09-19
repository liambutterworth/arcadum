<?php

use App\Http\Controllers\Api\CampaignController;
use App\Http\Controllers\Api\CampaignSessionController;
use Illuminate\Support\Facades\Route;

Route::middleware([])->group(function() {
    Route::apiResource('campaigns', CampaignController::class);
    Route::apiResource('campaigns.sessions', CampaignSessionController::class);
    // Route::apiResource('characters', 'CharacterController');
    // Route::apiResource('series', 'SeriesController');
    // Route::apiResource('series.installment', 'SeriesInstallmentController');
});
