<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\GuardedController;
use App\Models\Role;
use App\Models\User;
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
        return view('pages.admin.roles.index', ['roles' => Role::all()]);
    }

    public function show(): Factory|View|Application|RedirectResponse
    {
        return true;
    }

    public function edit(Role $role): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.roles.form', ['role' => $role]);
    }

    public function update(RoleRequest $request,  Role $role): Factory|View|Application|RedirectResponse
    {
        $req = $request->validated();
        $role->update($req);
        $role->save();

        Toastr::success('Role modified');
        return redirect(route('admin:roles.show', [$role]));
    }

    public function destroy(Role $role): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Role deleted: $role->name");
        $role->delete();
        return redirect(route('admin:roles.index'));
    }
}
