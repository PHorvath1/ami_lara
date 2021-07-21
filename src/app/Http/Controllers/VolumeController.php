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

    /**
     * Redirects the user to the volume listing page
     * @return Factory|View|Application|RedirectResponse
     */
    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.volumes.index', ['volumes' => Volume::latest()->paginate(10)]);
    }

    /**
     * Redirects the user to the volume create form
     * @return Factory|View|Application|RedirectResponse
     */
    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.volumes.form');
    }

    /**
     * Adds a volume to the database
     * @param VolumeRequest $request Volume data
     * @return Factory|View|Application|RedirectResponse
     */
    public function store(VolumeRequest $request): Factory|View|Application|RedirectResponse
    {
       $volume = Volume::create($request->validated());
        Toastr::success('New volume created');
        return redirect(route('volumes.show', [$volume]));
    }

    /**
     * Redirects the user to the volume show page
     * @param Volume $volume
     * @return Factory|View|Application|RedirectResponse
     */
    public function show(Volume $volume): Factory|View|Application|RedirectResponse
    {
        return view('pages.volumes.show', ['volume' => $volume, 'articles' => $volume->articles()->paginate(3)]);
    }

    /**
     * Redirects the user to the volume editor form
     * @param Volume $volume
     * @return Factory|View|Application|RedirectResponse
     */
    public function edit(Volume $volume): Factory|View|Application|RedirectResponse
    {
        return view('pages.volumes.form', ['volume' => $volume]);
    }

    /**
     * Updates the volume
     * @param VolumeRequest $request New volume data
     * @param Volume $volume Existing volume data
     * @return Factory|View|Application|RedirectResponse
     */
    public function update(VolumeRequest $request, Volume $volume): Factory|View|Application|RedirectResponse
    {
        $volume->update($request->validated());
        Toastr::success('Volume modified');
        return redirect(route('volumes.show', [$volume]));
    }

    /**
     * Removes a volume from the database
     * @param Volume $volume
     * @return Factory|View|Application|RedirectResponse
     */
    public function destroy(Volume $volume): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Volume deleted: $volume->id");
        $volume->delete();
        return redirect(route('volumes.index'));
    }
}
