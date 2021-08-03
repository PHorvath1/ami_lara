<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function profile(): Factory|View|Application|RedirectResponse
    {
        return view('pages.users.show', ['user' => Auth::user()]);
    }

    public function editProfile(): Factory|View|Application|RedirectResponse
    {
        return view('pages.users.form', ['user' => Auth::user()]);
    }

    public function update(UserRequest $request): Factory|View|Application|RedirectResponse
    {
        $user = Auth::user();
        $user->update($request->validated());
        $user->save();

        Toastr::success('User modified');
        return redirect(route('user.profile', [$user]));
    }

    public function destroy(): Factory|View|Application|RedirectResponse
    {
        $user = Auth::user();
        Toastr::warning("User deleted: $user->name");
        $user->delete();
        Auth::logout();
        return redirect(route('root'));
    }
}
