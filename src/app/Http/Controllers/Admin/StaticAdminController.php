<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class StaticAdminController extends Controller
{
    public function dashboard(): Factory|View|Application
    {
        return view('pages.admin.dashboard');
    }
}
