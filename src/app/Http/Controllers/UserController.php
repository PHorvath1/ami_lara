<?php

namespace App\Http\Controllers;

use App\Http\Middleware\BouncerCheck;
use App\Http\Requests\UserCreateRequest;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends GuardedController
{
    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.users.index', ['users' => User::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.users.form');
    }

    public function store(UserCreateRequest $request): Factory|View|Application|RedirectResponse
    {
        $user = User::create($request->transform());
        Toastr::success('New user created');
        return redirect(route('users.show', [$user]));
    }

    public function show(User $user): Factory|View|Application|RedirectResponse
    {
        return view('pages.users.show', ['user' => $user]);
    }

    public function edit(User $user): Factory|View|Application|RedirectResponse
    {
        return view('pages.users.form', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user): Factory|View|Application|RedirectResponse
    {
        $user->update($request->validated());
        $user->save();

        Toastr::success('User modified');
        return redirect(route('users.show', [$user]));
    }

    public function destroy(User $user): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("User deleted: $user->name");
        $user->delete();
        return redirect(route('users.index'));
    }
}
