<?php

use App\Http\Controllers\Admin\StaticAdminController;

Route::get('/', [StaticAdminController::class, 'dashboard'])->name('dashboard');
