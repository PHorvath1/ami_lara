<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Role;


class RoleAdminController extends GuardedController
{

    // Functions to be implemented...

    public function index(): Factory|View|Application|RedirectResponse
    {
        return true;
    }

    public function show(): Factory|View|Application|RedirectResponse
    {
        return true;
    }

    public function modify(): Factory|View|Application|RedirectResponse
    {
        return true;
    }

    public function update(): Factory|View|Application|RedirectResponse
    {
        return true;
    }

    public function destroy(Role $role): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Role deleted: $role->name");
        $role->delete();
        return redirect(route('admin:roles.index'));
    }
}
