<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use \Illuminate\Support\Facades\Auth;
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
        return view('pages.note');
    })->name('home');

    Route::post('/{username}/{workspace_id}', [WorkspaceController::class, 'viewWorkspace'])->name('viewWorkspace');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::fallback(function () {
        return redirect()->route('viewWorkspace', [Auth::user()->username, Auth::user()->workspaces()->first()->id]);
    });

});

Route::middleware('checkUserIsLogin')->group(function() {
    Route::get('/create-workspace/1', [WorkspaceController::class, 'workspaceType'])->name('viewCreateWorkspace.type');
    Route::get('/create-workspace/2', [WorkspaceController::class, 'workspaceDetail'])->name('viewCreateWorkspace.detail');

    Route::post('/create-workspace', [WorkspaceController::class, 'create'])->name('createWorkspace');
});
