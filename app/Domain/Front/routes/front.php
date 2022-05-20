<?php

use App\Http\Middleware\VerifyCsrfToken;
use App\Providers\FortifyServiceProvider;
use App\Providers\JetstreamServiceProvider;
use Domain\Front\Http\Controllers\CourseWorkController;
use Domain\Front\Http\Controllers\CourseWorkMediaController;
use Illuminate\Support\Facades\Route;

FortifyServiceProvider::registerRoutes('front');
JetStreamServiceProvider::registerRoutes('front');

Route::domain(domainFor())
    ->middleware(['web', 'front', 'auth:sanctum', 'verified'])
    ->name('front.')
    ->group(function () {
        Route::get('/', fn(Request $request) => redirect()->route('front.course-works.index'))->name('dashboard');

        Route::controller(CourseWorkController::class)
            ->prefix('course-works')
            ->as('course-works.')
            ->group(function () {
                Route::get('/', 'index')->name('index');

                Route::get('/{course_work:uuid}', 'show')
                    ->whereUuid('course_work')
                    ->name('show');

                Route::get('/{course_work:uuid}/{media:uuid}', 'preview')
                    ->whereUuid(['course_work', 'media'])
                    ->name('preview');
            });

        Route::controller(CourseWorkMediaController::class)
            ->prefix('course-works/media')
            ->as('course-works.media.')
            ->group(function () {
                Route::post('/{course_work:uuid}', 'store')
                    ->withoutMiddleware(VerifyCsrfToken::class)
                    ->whereUuid('course_work')
                    ->name('store');
            });
    });
