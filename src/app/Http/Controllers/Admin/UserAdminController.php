<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\GuardedController;
use App\Models\User;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Utils\Bouncer;
use App\Utils\StatusCode;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserAdminController extends GuardedController
{
    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('adminlte::page', ['users' => User::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('users.form');
    }

    public function store(UserRequest $request): Factory|View|Application|RedirectResponse
    {
       $user = User::create($request->validated());
        Toastr::success('New user created');
        return redirect(route('users.show', [$user]));
    }

    public function show(User $user): Factory|View|Application|RedirectResponse
    {
        return view('users.show', ['user' => $user]);
    }

    public function edit(User $user): Factory|View|Application|RedirectResponse
    {
        return view('users.form', ['user' => $user]);
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
        Toastr::warning("User deleted: $user->id");
        $user->delete();
        return redirect(route('users.index'));
    }
}
