<?php

use App\Http\Controllers\CourseWorkController;
use App\Http\Controllers\CourseWorkMediaController;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::domain(domainFor())
    ->middleware(['auth:sanctum', 'verified'])
    ->group(function () {
//        Route::get('/', function () {
//            return Inertia::render('Dashboard');
//        })->name('dashboard');

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
