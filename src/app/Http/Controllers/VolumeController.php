<?php

namespace App\Http\Controllers;

use App\Http\Requests\VolumeRequest;
use App\Models\Volume;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class VolumeController extends GuardedController
{

    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.volume.index', ['volumes' => Volume::paginate(20)]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.volumes.form');
    }

    public function store(VolumeRequest $request): Factory|View|Application|RedirectResponse
    {
       $volume = Volume::create($request->validated());
        Toastr::success('New volume created');
        return redirect(route('volumes.show', [$volume]));
    }

    public function show(Volume $volume): Factory|View|Application|RedirectResponse
    {
        return view('pages.volumes.show', ['volume' => $volume, 'articles' => $volume->articles()->paginate(6)]);
    }

    public function edit(Volume $volume): Factory|View|Application|RedirectResponse
    {
        return view('pages.volumes.form', ['volume' => $volume]);
    }

    public function update(VolumeRequest $request, Volume $volume): Factory|View|Application|RedirectResponse
    {
        $volume->update($request->validated());
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
