<?php

use App\Providers\FortifyServiceProvider;
use App\Providers\JetstreamServiceProvider;
use Domain\Supervisor\Http\Controllers\DashboardController;

FortifyServiceProvider::registerRoutes('supervisor');
JetStreamServiceProvider::registerRoutes('supervisor');

Route::domain(domainFor('supervisor'))
    ->middleware(['web', 'supervisor', 'auth:supervisor', 'verified'])
    ->name('supervisor.')
    ->group(function () {
        Route::get('/', DashboardController::class)->name('dashboard');
    });
