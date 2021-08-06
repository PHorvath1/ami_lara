<?php

use App\Http\Controllers\Admin\StaticAdminController;

Route::get('/', [StaticAdminController::class, 'dashboard'])->name('dashboard');
Route::resource('users', UserAdminController::class);
Route::get('/volumes', [VolumeAdminController::class, 'index']);
