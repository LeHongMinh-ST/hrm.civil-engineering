<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthLoginRequest;
use Illuminate\Http\RedirectResponse;
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

    public function login(AuthLoginRequest $request): RedirectResponse
    {
        $request->merge([$this->username() => request()->input('username')]);
        $credentials = request([$this->username(), 'password']);

        if (!auth()->attempt($credentials)) {
            return redirect()->back()
                ->withErrors(['username' => ['Vui lòng kiểm tra lại tài khoản hoặc mật khẩu!']])
                ->withInput();
        }


        return redirect()->route('dashboard');
    }


    private function username(): string
    {
        return filter_var(request()->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    }

}
