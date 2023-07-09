<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('preventBackHistory')->group(function () {

    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'getLoginForm'])->name('login');
        Route::post('/login', [AuthController::class, 'login'])->name('postLogin');
    });

    Route::middleware('auth')->group(function () {
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('users')->name('users.')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('index');
        });

        Route::prefix('workers')->name('workers.')->group(function () {
            Route::get('/', [WorkerController::class, 'index'])->name('index');
        });
    });
});
