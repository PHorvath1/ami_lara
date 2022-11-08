<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\GuardedController;
use App\Http\Requests\VolumeRequest;
use App\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;

class RoleAdminController extends GuardedController
{

    // Functions to be implemented...

    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.roles.index', ['roles' => Role::all()]);
    }

    public function show(Role $role): Factory|View|Application|RedirectResponse
    {
        return view("pages.admin.roles.show", ['role' => $role]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.roles.form');
    }

    public function store(Request $request): Factory|View|Application|RedirectResponse
    {

        $req = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'level' => [],
            'scope' => [],
        ]);
        $role = Role::create($req);
        $role->save();
        Toastr::success('New role created');
        return redirect(route('admin:roles.show', [$role]));
    }
    public function edit(Role $role): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.roles.form', ['role' => $role]);
    }

    public function update(Request $request,  Role $role): Factory|View|Application|RedirectResponse
    {
        $req = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'level' => [],
            'scope' => [],
        ]);
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
