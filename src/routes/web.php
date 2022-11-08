<?php

use App\Http\Controllers\Admin\StaticAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\admin\VolumeAdminController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BouncerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RevisionController;
use App\Http\Controllers\StaticController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VolumeController;
use App\Http\Controllers\DownloadFileController;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\Mailcontroller;


Route::get('/', [StaticController::class, 'home'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('user.profile');
    Route::get('/profile/edit', [ProfileController::class, 'editProfile'])->name('user.profile.edit');
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('signout');
    Route::get('/mail',  [MailController::class,'sendMail']);

    Route::resource('users', UserController::class);
    Route::resource('articles', ArticleController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('volumes', VolumeController::class);
    Route::resource('revisions', RevisionController::class);
    Route::post('articles/{article}', [CommentController::class, 'store']) -> name('comment.store');
    Route::post('/auth/{user}/assign_role/{role}', [BouncerController::class, 'assign_role'])->name('user.role.assign_role');
    Route::post('/auth/{user}/unassign_role/{role}', [BouncerController::class, 'unassign_role'])->name('user.role.unassign_role');
    Route::get('/download/{fileName}', [DownloadFileController::class, 'download'])->name('download');
    Route::get('/submissions', [StaticController::class, 'submissions'])->name('submissions');

});
    Route::get('/about', [StaticController::class, 'about'])->name('about');
    Route::get('/content', [StaticController::class, 'content'])->name('content');
