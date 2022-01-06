<?php

use App\Providers\FortifyServiceProvider;
use App\Providers\JetstreamServiceProvider;
use Domain\Admin\Http\Controllers\DashboardController;

FortifyServiceProvider::registerRoutes('admin');
JetStreamServiceProvider::registerRoutes('admin');

Route::domain(domainFor('admin'))
    ->middleware(['web', 'admin', 'auth:admin', 'verified'])
    ->name('admin.')
    ->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');
    });
