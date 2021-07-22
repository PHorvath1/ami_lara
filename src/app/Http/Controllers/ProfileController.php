<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Shows the user their profile page
     * @return Factory|View|Application|RedirectResponse
     */
    public function profile(): Factory|View|Application|RedirectResponse
    {
        return view('pages.users.show', ['user' => Auth::user()]);
    }

    /**
     * Shows the user their profile editor form
     * @return Factory|View|Application|RedirectResponse
     */
    public function editProfile(): Factory|View|Application|RedirectResponse
    {
        return view('pages.users.form', ['user' => Auth::user()]);
    }
}
