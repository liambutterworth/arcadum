<?php

namespace App\Providers;

use App\Models\Campaign;
use App\Models\Installment;
use App\Models\Region;
use App\Models\Session;
use App\Observers\SessionObserver;
use App\Observers\InstallmentObserver;
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

        Session::observe(SessionObserver::class);
        Installment::observe(InstallmentObserver::class);
        Region::observe(RegionObserver::class);
    }
}
