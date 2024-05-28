<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use \App\Http\Middleware\CheckUserLogin;
use \App\Http\Middleware\CheckUserIsLogin;

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

Route::middleware([CheckUserLogin::class])->group(function () {
    Route::get('/login', [AuthController::class, 'viewLogin'])->name('viewLogin');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', [AuthController::class, 'viewRegister'])->name('viewRegister');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware([CheckUserIsLogin::class])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
