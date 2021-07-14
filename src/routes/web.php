<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BouncerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;

Route::get('/', [StaticController::class, 'Welcome'])->name('root');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [StaticController::class, 'Home'])->name('home');
    Route::get('/profile', [ProfileController::class, 'profile'])->name('user.profile');
    Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('user.profile.edit');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('signout');

    Route::resource('users', UserController::class);
    Route::resource('articles', ArticleController::class);
    Route::post('/auth/{user}/assign_role/{role}', [BouncerController::class, 'assign_role'])->name('user.role.assign_role');
    Route::post('/auth/{user}/unassign_role/{role}', [BouncerController::class, 'unassign_role'])->name('user.role.unassign_role');

});
    Route::get('test', [StaticController::class, 'test']);
