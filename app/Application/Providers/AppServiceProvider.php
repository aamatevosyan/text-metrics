<?php

namespace App\Providers;

use Barryvdh\Debugbar\ServiceProvider as DebugBarServiceProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Bouncer;
use Illuminate\Support\ServiceProvider;
use Spatie\LaravelRay\RayServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->isLocal()) {
            $this->app->register(RayServiceProvider::class);
            $this->app->register(IdeHelperServiceProvider::class);
            $this->app->register(DebugBarServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Bouncer::cache();
    }
}
