<?php

namespace App\Providers;

use App\Models\Campaign;
use App\Models\CampaignSession;
use App\Models\Character;
use App\Models\ClassType;
use App\Models\ClassArchetype;
use App\Models\Location;
use App\Models\Organization;
use App\Models\SeriesInstallment;
use App\Observers\SeriesInstallmentObserver;
use App\Observers\CampaignSessionObserver;
use App\Support\Macros\ResponseMacros;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // morph names
        Relation::morphMap([
            'campaign' => Campaign::class,
            'character' => Character::class,
            'class-type' => ClassType::class,
            'class-archetype' => ClassArchetype::class,
            'location' => Location::class,
            'organization' => Organization::class,
        ]);

        // observers
        CampaignSession::observe(CampaignSessionObserver::class);
        SeriesInstallment::observe(SeriesInstallmentObserver::class);

        // macros
        Response::mixin(new ResponseMacros());
    }
}
