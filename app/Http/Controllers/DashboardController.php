<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a dashboard of the page.
     *
     * @return Application|Factory|View
     */
    public function index(): Factory|View|Application
    {
        return view('pages.dashboard');
    }
}
