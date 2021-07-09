<?php

namespace App\Http\Controllers;

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

class VolumeController extends Controller
{

    public function index(): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('index', Volume::class)){
                    abort(StatusCode::FORBIDDEN);
        }

        return view('volume.index', ['volumes' => Volume::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
         if(!Bouncer::can('create', Volume::class)){
            abort(StatusCode::FORBIDDEN);
         }

        return view('volumes.form');
    }

    public function store(VolumeRequest $request): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('create', Volume::class)){
           abort(StatusCode::FORBIDDEN);
        }

       $volume = Volume::create($request->validated());
        Toastr::success('New volume created');
        return redirect(route('volumes.show', [$volume]));
    }

    public function show(Volume $volume): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('view', Volume::class)){
            abort(StatusCode::FORBIDDEN);
        }
        return view('volumes.show', ['volume' => $volume]);
    }

    public function edit(Volume $volume): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('edit', Volume::class)){
            abort(StatusCode::FORBIDDEN);
        }

        return view('volumes.form', ['volume' => $volume]);
    }

    public function update(VolumeRequest $request, Volume $volume): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('edit', Volume::class)){
            abort(StatusCode::FORBIDDEN);
        }

        $volume->update($request->validated());
        $volume->save();

        Toastr::success('Volume modified');
        return redirect(route('volumes.show', [$volume]));
    }

    public function destroy(Volume $volume): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('delete', Volume::class)){
           abort(StatusCode::FORBIDDEN);
        }

        Toastr::warning("Volume deleted: $volume->id");
        $volume->delete();
        return redirect(route('volumes.index'));
    }
}
