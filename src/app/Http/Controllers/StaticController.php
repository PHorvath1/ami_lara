<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class StaticController extends Controller
{
    public function Welcome(): Factory|View|Application
    {
        return view('pages.welcome');
    }

    public function Home(): Factory|View|Application
    {
        return view('pages.home');
    }

    public function test(){
        return view('pages.test');
    }
    public function About(): Factory|View|Application
    {
        return view('pages.about');
    }
    public function Content(): Factory|View|Application
    {
        return view('pages.content');
    }
    public function Submissions(): Factory|View|Application
    {
        return view('pages.submissions');
    }
}
