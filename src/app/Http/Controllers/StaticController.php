<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class StaticController extends Controller
{
    /**
     * Redirects the user to the home page
     * @return Factory|View|Application
     */
    public function home(): Factory|View|Application
    {
        return view('pages.home');
    }

    /**
     * Redirects the user to the test page
     * @return Application|Factory|View
     */
    public function test(){
        return view('pages.test');
    }

    /**
     * Redirects the user to the about page
     * @return Application|Factory|View
     */
    public function about(): Factory|View|Application
    {
        return view('pages.about');
    }

    /**
     * Redirects the user to the content page
     * @return Application|Factory|View
     */
    public function content(): Factory|View|Application
    {
        return view('pages.content');
    }

    /**
     * Redirects the user to the submissions page
     * @return Application|Factory|View
     */
    public function submissions(): Factory|View|Application
    {
        return view('pages.submissions');
    }
}
