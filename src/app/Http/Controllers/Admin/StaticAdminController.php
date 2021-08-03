<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaticAdminController extends Controller
{
    public function dashboard(){
        return view('pages.admin.dashboard');
    }
}
