<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('App\Contracts\Repository', 'App\Repositories\Repostitory');
        $this->app->bind('App\Contracts\CharacterRepository', 'App\Repositories\CharacterRepository');
    }
}
