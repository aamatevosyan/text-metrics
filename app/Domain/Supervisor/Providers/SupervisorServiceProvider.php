<?php

namespace Domain\Supervisor\Providers;

use Illuminate\Support\ServiceProvider;

class SupervisorServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerRoutes();
    }

    protected function registerRoutes(): void
    {
        $this->loadRoutesFrom(base_path('app/Domain/Supervisor/routes/supervisor.php'));
    }
}
