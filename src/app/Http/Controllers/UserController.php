<?php

namespace App\Http\Controllers;

use App\Filters\User\NameContains;
use App\Filters\UserFilter;
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
    /**
     * Shows the user listing page
     * @return Factory|View|Application|RedirectResponse
     */
    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.users.index')->with('users', User::filterWith(UserFilter::class)->through('name', 'created_gt')->paginate(2));
    }

    /**
     * Shows the user create form
     * @return Factory|View|Application|RedirectResponse
     */
    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.users.form');
    }

    /**
     * Adds a new user to the database
     * @param UserCreateRequest $request User data
     * @return Factory|View|Application|RedirectResponse
     */
    public function store(UserCreateRequest $request): Factory|View|Application|RedirectResponse
    {
        $user = User::create($request->transform());
        Toastr::success('New user created');
        return redirect(route('users.show', [$user]));
    }

    /**
     * Shows the show user page
     * @param User $user User data
     * @return Factory|View|Application|RedirectResponse
     */
    public function show(User $user): Factory|View|Application|RedirectResponse
    {
        return view('pages.users.show', ['user' => $user]);
    }

    /**
     * Shows the user editor form
     * @param User $user
     * @return Factory|View|Application|RedirectResponse
     */
    public function edit(User $user): Factory|View|Application|RedirectResponse
    {
        return view('pages.users.form', ['user' => $user]);
    }

    /**
     * Updates the user
     * @param UserRequest $request New user data
     * @param User $user Existing user data
     * @return Factory|View|Application|RedirectResponse
     */
    public function update(UserRequest $request, User $user): Factory|View|Application|RedirectResponse
    {
        $user->update($request->validated());
        $user->save();

        Toastr::success('User modified');
        return redirect(route('users.show', [$user]));
    }

    /**
     * Removes the user from the database
     * @param User $user
     * @return Factory|View|Application|RedirectResponse
     */
    public function destroy(User $user): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("User deleted: $user->name");
        $user->delete();
        return redirect(route('users.index'));
    }
}
