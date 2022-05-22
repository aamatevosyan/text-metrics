<?php

use App\Providers\FortifyServiceProvider;
use App\Providers\JetstreamServiceProvider;
use Domain\Supervisor\Http\Controllers\CourseWorkController;

FortifyServiceProvider::registerRoutes('supervisor');
JetStreamServiceProvider::registerRoutes('supervisor');

Route::domain(domainFor('supervisor'))
    ->middleware(['web', 'supervisor', 'auth:supervisor', 'verified'])
    ->name('supervisor.')
    ->group(function () {
        Route::get('/', fn(Request $request) => redirect()->route('supervisor.course-works.index'))->name('dashboard');

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

                Route::post('/{document:uuid}/{uuid}/comments', 'addComment')
                    ->whereUuid(['document', 'uuid'])
                    ->name('add-comment');
            });
    });
