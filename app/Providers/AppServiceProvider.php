<?php

namespace App\Providers;

use App\Models\Campaign;
use App\Models\Episode;
use App\Observers\CampaignObserver;
use App\Observers\EpisodeObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Campaign::observe(CampaignObserver::class);
        Episode::observe(EpisodeObserver::class);
    }
}
