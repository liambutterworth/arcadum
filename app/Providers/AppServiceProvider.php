<?php

namespace App\Providers;

use App\Models\Campaign;
use App\Models\CampaignSession;
use App\Models\Region;
use App\Models\SeriesInstallment;
use App\Observers\CampaignSessionObserver;
use App\Observers\SeriesInstallmentObserver;
use App\Observers\RegionObserver;
use Illuminate\Database\Eloquent\Relations\Relation;
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
        Relation::morphMap([
            'campaign' => Campaign::class,
        ]);

        CampaignSession::observe(CampaignSessionObserver::class);
        SeriesInstallment::observe(SeriesInstallmentObserver::class);
        Region::observe(RegionObserver::class);
    }
}
