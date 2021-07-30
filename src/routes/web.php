<?php

use App\Http\Controllers\Admin\StaticAdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BouncerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VolumeController;
use App\Http\Controllers\DownloadFileController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

Route::get('/', [StaticController::class, 'home'])->name('root');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [StaticController::class, 'home'])->name('home');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('user.profile');
    Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('user.profile.edit');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('signout');

    Route::resource('users', UserController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('volumes', VolumeController::class);
    Route::post('articles/{article}', [CommentController::class, 'store']) -> name('comment.store');
    Route::post('/auth/{user}/assign_role/{role}', [BouncerController::class, 'assign_role'])->name('user.role.assign_role');
    Route::post('/auth/{user}/unassign_role/{role}', [BouncerController::class, 'unassign_role'])->name('user.role.unassign_role');
    Route::get('/download/{fileName}', [DownloadFileController::class, 'download'])->name('download');

    Route::group(['prefix' => 'admin'], function (){
        Route::get('/dashboard', [StaticAdminController::class, 'dashboard']);
    });
});
    Route::get('test', [StaticController::class, 'test']);
    Route::get('/about', [StaticController::class, 'about'])->name('about');
    Route::get('/submissions', [StaticController::class, 'submissions'])->name('submissions');
    Route::get('/content', [StaticController::class, 'content'])->name('content');

