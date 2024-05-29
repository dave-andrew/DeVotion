<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use \App\Http\Middleware\CheckUserLogin;
use \App\Http\Middleware\CheckUserIsLogin;
use \App\Http\Controllers\WorkspaceController;

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

Route::middleware('checkUserLogin')->group(function () {
    Route::get('/login', [AuthController::class, 'viewLogin'])->name('viewLogin');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', [AuthController::class, 'viewRegister'])->name('viewRegister');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware(['checkUserIsLogin', 'checkUserWorkspace'])->group(function () {
    Route::get('/', function () {
        return view('pages.home');
    })->name('home');
    
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
Route::get('/workspace', function(){return view('pages.workspace');});
Route::get('/create-workspace', [WorkspaceController::class, 'index'])->name('viewCreateWorkspace');
Route::post('/create-workspace', [WorkspaceController::class, 'createWorkspace'])->name('createWorkspace');
