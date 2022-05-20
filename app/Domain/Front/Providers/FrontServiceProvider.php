<?php

namespace Domain\Front\Providers;

use Illuminate\Support\ServiceProvider;

class FrontServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerRoutes();
    }

    protected function registerRoutes(): void
    {
        $this->loadRoutesFrom(base_path('app/Domain/Front/routes/front.php'));
    }
}
