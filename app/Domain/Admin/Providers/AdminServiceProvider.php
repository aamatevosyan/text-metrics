<?php

namespace Domain\Admin\Providers;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
  public function boot(): void
  {
    $this->registerRoutes();
  }

  protected function registerRoutes(): void
  {
    $this->loadRoutesFrom(base_path('app/Domain/Admin/routes/admin.php'));
  }
}
