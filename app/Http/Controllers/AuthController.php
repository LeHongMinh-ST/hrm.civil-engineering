<?php
declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthLoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;


/**
 * @class AuthController
 * About the Auth Controller
 *
 * @package App\Http\Controller
 *
 * @author Lê Hồng Minh <minhhl298.st@gmail.com>
 */
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


    /**
     * Handle the login request and redirect to the home page
     *
     * @param AuthLoginRequest $request
     * @return RedirectResponse
     */
    public function login(AuthLoginRequest $request): RedirectResponse
    {

        $request->merge([$this->username() => request()->input('username')]);
        $credentials = request([$this->username(), 'password']);

        $rememberMe = $request->has('remember');

        if (!auth()->attempt($credentials, $rememberMe)) {
            return redirect()->back()
                ->withErrors(['username' => ['Vui lòng kiểm tra lại tài khoản hoặc mật khẩu!']])
                ->withInput();
        }


        return redirect()->route('dashboard');
    }


    /**
     * Get type of username
     *
     * @return string
     */
    private function username(): string
    {
        return filter_var(request()->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
    }


    /**
     * Handle logout auth and redirect login form
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        auth()->logout();
        return redirect()->route('login');
    }

}
