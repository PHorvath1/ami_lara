<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\GuardedController;
use App\Http\Requests\VolumeRequest;
use App\Models\Volume;
use App\Utils\Bouncer;
use App\Utils\StatusCode;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class VolumeAdminController extends GuardedController
{

    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.volumes.index', ['volumes' => Volume::latest('id')->get()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.volumes.form');
    }

    public function store(VolumeRequest $request): Factory|View|Application|RedirectResponse
    {
       $volume = Volume::create($request->validated());
        Toastr::success('New volume created');
        return redirect(route('volumes.show', [$volume]));
    }

    public function show(Volume $volume): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.volumes.show', ['volume' => $volume, 'articles' => $volume->articles()->paginate(3)]);
    }

    public function edit(Volume $volume): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.volumes.form', ['volume' => $volume]);
    }

    public function update(VolumeRequest $request, Volume $volume): Factory|View|Application|RedirectResponse
    {
        $volume->update($request->validated());
        $volume->save();

        Toastr::success('Volume modified');
        return redirect(route('volumes.show', [$volume]));
    }

    public function destroy(Volume $volume): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Volume deleted: $volume->id");
        $volume->delete();
        return redirect(route('volumes.index'));
    }
}
