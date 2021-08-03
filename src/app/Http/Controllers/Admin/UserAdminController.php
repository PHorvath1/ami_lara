<?php

namespace App\Http\Controllers;

use App\Http\Middleware\BouncerCheck;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserAdminController extends GuardedController
{
    //protected array $except = ['index', 'show'];

    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.users.index', ['users' => User::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.users.form');
    }

    public function store(UserRequest $request): Factory|View|Application|RedirectResponse
    {
        $user = User::create($request->validated());
        Toastr::success('New user created');
        return redirect(route('admin:users.show', [$user]));
    }

    public function show(User $user): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.users.show', ['user' => $user]);
    }

    public function edit(User $user): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.users.form', ['user' => $user]);
    }

    public function update(UserRequest $request, User $user): Factory|View|Application|RedirectResponse
    {
        $user->update($request->validated());
        $user->save();

        Toastr::success('User modified');
        return redirect(route('admin:users.show', [$user]));
    }

    public function destroy(User $user): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("User deleted: $user->name");
        $user->delete();
        return redirect(route('admin:users.index'));
    }
}
