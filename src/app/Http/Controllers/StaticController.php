<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class StaticController extends Controller
{
    public function home(): Factory|View|Application
    {
        return view('pages.home');
    }

    public function test(){
        return view('pages.test');
    }
    public function about(): Factory|View|Application
    {
        return view('pages.about');
    }
    public function content(): Factory|View|Application
    {
        return view('pages.content');
    }
    public function submissions(): Factory|View|Application
    {
        return view('pages.submissions');
    }
}
