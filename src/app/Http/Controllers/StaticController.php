<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class StaticController extends Controller
{
    /**
     * Shows the home page
     * @return Factory|View|Application
     */
    public function home(): Factory|View|Application
    {
        return view('pages.home');
    }

    /**
     * Shows the test page
     * @return Application|Factory|View
     */
    public function test(){
        return view('pages.test');
    }

    /**
     * Shows the about page
     * @return Application|Factory|View
     */
    public function about(): Factory|View|Application
    {
        return view('pages.about');
    }

    /**
     * Shows the content page
     * @return Application|Factory|View
     */
    public function content(): Factory|View|Application
    {
        return view('pages.content');
    }

    /**
     * Shows the submissions page
     * @return Application|Factory|View
     */
    public function submissions(): Factory|View|Application
    {
        return view('pages.submissions');
    }
}
