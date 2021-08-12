<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Models\Volume;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class StaticController extends Controller
{
    public function Welcome(): Factory|View|Application
    {
        return view('pages.welcome');
    }

    public function home(): Factory|View|Application
    {
        return view('pages.home');
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
        return view('pages.volumes.index', ['volumes' => Volume::latest()->paginate(10)]);
    }

    /**
     * Shows the submissions page
     * @return Application|Factory|View
     */
    public function submissions(): Factory|View|Application
    {
        return view('pages.articles.form', ['types' => Type::all()]);
    }
}
