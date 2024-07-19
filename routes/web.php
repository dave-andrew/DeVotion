<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\TeamspaceController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkspaceController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\WorkspaceuserController;
use Illuminate\Support\Facades\Log;

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

Route::middleware(['checkUserIsLogin', 'checkUserWorkspace', 'authenticateWorkspace'])->group(function () {
    Route::get('/{workspace_id}', [WorkspaceController::class, 'viewWorkspace'])->name('viewWorkspace');

    Route::post('/duplicateNote/{workspace_id}', [NoteController::class,'duplicate'])
        ->middleware('checkCreateNoteAuthorization')
        ->name('duplicateNote');

    Route::post('/{workspace_id}/invite', [InvitationController::class, 'create'])
        ->middleware('checkInviteAuthorization')
        ->name('invitation.create');

    Route::post('/{workspace_id}/roles', [WorkspaceuserController::class, 'promote'])
        ->middleware('checkPromoteAuthorization')
        ->name('promoteUser');

    Route::post('/{workspace_id}/createNote', [NoteController::class,'create'])
        ->middleware('checkCreateNoteAuthorization')
        ->name('createNote');

    Route::post('/updateNote', [NoteController::class,'update'])
        ->middleware('checkCreateNoteAuthorization')
        ->name('updateNote');

    Route::post('/{workspace_id}/addNoteDetail', [NoteController::class,'addNoteDetail'])
        ->middleware('checkCreateNoteAuthorization')
        ->name('addNoteDetail');

    Route::delete('/{workspace_id}/deleteNoteDetail', [NoteController::class,'deleteNoteDetail'])
        ->middleware('checkCreateNoteAuthorization')
        ->name('deleteNoteDetail');

    Route::delete('/{workspace_id}/deleteNote', [NoteController::class,'delete'])
        ->middleware('checkInviteAuthorization')
        ->name('deleteNote');

   Route::get('/{workspace_id}/note/{note_id}', [WorkspaceController::class, 'viewWorkspaceNote'])
       ->name('viewWorkspaceNote');

    Route::post('/{workspace_id}/note/{note_id}', [WorkspaceController::class, 'viewWorkspaceNote'])
        ->name('viewWorkspaceNote');
});

Route::middleware('checkInvitation')->group(function () {
    Route::post('/accept-invitation', [InvitationController::class, 'accept'])->name('invitation.accept');
    Route::post('/decline-invitation', [InvitationController::class, 'decline'])->name('invitation.decline');
});

Route::middleware(['checkUserIsLogin'])->group(function() {
    Route::get('/create-workspace/1', [WorkspaceController::class, 'workspaceType'])->name('viewCreateWorkspace.type');
    Route::get('/create-workspace/2', [WorkspaceController::class, 'workspaceDetail'])->name('viewCreateWorkspace.detail');

    Route::post('/create-workspace', [WorkspaceController::class, 'store'])->name('create.workspace');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::post('/{workspace_id}/createTeamspace', [TeamspaceController::class,'create'])->name('createTeamspace');

Route::post('/{workspace_id}/updateWorkspace', [WorkspaceController::class, 'updateWorkspace'])
    ->name('updateWorkspace');
Route::delete('/{workspace_id}/deleteWorkspace', [WorkspaceController::class, 'deleteWorkspace'])
    ->name('deleteWorkspace');

// User Accounts
Route::post('/changeUsername', [UserController::class, 'changeUsername'])->name('changeUsername');
Route::put('/changePassword', [UserController::class, 'changePassword'])->name('changePassword');
Route::put('/changeEmail', [UserController::class, 'changeEmail'])->name('changeEmail');
Route::post('/deleteAccount', [UserController::class, 'deleteAccount'])->name('deleteAccount');
