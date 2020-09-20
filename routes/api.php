<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Api')->group(function() {
    Route::resource('campaigns', 'AlignmentController');
    Route::resource('campaigns', 'BackgroundController');
    Route::resource('campaigns', 'CampaignController');
    Route::resource('campaigns', 'CampaignSessionController');
    Route::resource('campaigns', 'CharacterController');
    Route::resource('campaigns', 'ClassArchetypeController');
    Route::resource('campaigns', 'ClassFeatureController');
    Route::resource('campaigns', 'ClassLevelController');
    Route::resource('campaigns', 'ClassTypeController');
    Route::resource('campaigns', 'DeityController');
    Route::resource('campaigns', 'DeityPantheonController');
    Route::resource('campaigns', 'FeatController');
    Route::resource('campaigns', 'LocationController');
    Route::resource('campaigns', 'LocationTypeController');
    Route::resource('campaigns', 'OrganizationController');
    Route::resource('campaigns', 'OrganizationCategoryController');
    Route::resource('campaigns', 'OrganizationTypeController');
    Route::resource('campaigns', 'ProficiencyController');
    Route::resource('campaigns', 'ProficiencyTypeController');
    Route::resource('campaigns', 'PropertyController');
    Route::resource('campaigns', 'RaceController');
    Route::resource('campaigns', 'SeriesController');
    Route::resource('campaigns', 'SeriesInstallmentController');
    Route::resource('campaigns', 'SpellController');
    Route::resource('campaigns', 'SpellSchoolController');
    Route::resource('campaigns', 'SpellTypeController');
    Route::resource('campaigns', 'UserController');
});
