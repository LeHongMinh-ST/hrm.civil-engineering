<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


class AuthController extends Controller
{

    /**
     * Display a login of the page.
     *
     * @return Application|Factory|View
     */
    public function getLoginForm(): Factory|View|Application
    {
        return view('auth.login');
    }


}
