<?php

namespace Domain\Admin\Http\Controllers;

use App\Http\Controllers\Controller;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
        ray('here');
        return Inertia::render('Dashboard');
    }
}
