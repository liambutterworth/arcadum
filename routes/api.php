<?php

use Illuminate\Support\Facades\Route;

Route::namespace('App\Http\Controllers\Api')->group(function() {
    Route::resource('alignments', 'AlignmentController');
    Route::resource('backgrounds', 'BackgroundController');
    Route::resource('campaigns', 'CampaignController');
    Route::resource('campaigns.sessions', 'CampaignSessionController');
    Route::resource('characters', 'CharacterController');
    Route::resource('deities', 'DeityController');
    Route::resource('pantheons', 'PantheonController');
    Route::resource('feats', 'FeatController');
    Route::resource('locations', 'LocationController');
    Route::resource('organizations', 'OrganizationController');
    Route::resource('proficiencies', 'ProficiencyController');
    Route::resource('properties', 'PropertyController');
    Route::resource('races', 'RaceController');
    Route::resource('series', 'SeriesController');
    Route::resource('series.installment', 'SeriesInstallmentController');
    Route::resource('spells', 'SpellController');
    Route::resource('users', 'UserController');

    Route::prefix('class')->group(function() {
        Route::resource('archetypes', 'ClassArchetypeController');
        Route::resource('features', 'ClassFeatureController');
        Route::resource('levels', 'ClassLevelController');
        Route::resource('types', 'ClassTypeController');
    });

    Route::prefix('location')->group(function() {
        Route::resource('types', 'LocationTypeController');
    });

    Route::prefix('organization')->group(function() {
        Route::resource('categories', 'OrganizationCategoryController');
        Route::resource('types', 'OrganizationTypeController');
    });

    Route::prefix('proficiency')->group(function() {
        Route::resource('types', 'ProficiencyTypeController');
    });

    Route::prefix('spell')->group(function() {
        Route::resource('schools', 'SpellSchoolController');
        Route::resource('types', 'SpellTypeController');
    });
});
