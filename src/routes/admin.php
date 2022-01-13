<?php

use App\Http\Controllers\Admin\StaticAdminController;
use App\Http\Controllers\admin\VolumeAdminController;
use App\Http\Controllers\Admin\ArticleAdminController;
use App\Http\Controllers\Admin\UserAdminController;
use App\Http\Controllers\Admin\RoleAdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [StaticAdminController::class, 'dashboard'])->name('dashboard');
Route::resource('/users', UserAdminController::class);
Route::resource('/volumes', VolumeAdminController::class);
Route::resource('/articles', ArticleAdminController::class);
Route::resource('/roles', RoleAdminController::class);
