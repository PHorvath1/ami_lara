<?php

namespace App\Http\Controllers;

use App\Http\Requests\RevisionRequest;
use App\Models\Revision;
use App\Utils\Bouncer;
use App\Utils\StatusCode;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RevisionController extends Controller
{

    public function index(): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('index', Revision::class)){
                    abort(StatusCode::FORBIDDEN);
        }

        return view('revision.index', ['revisions' => Revision::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
         if(!Bouncer::can('create', Revision::class)){
            abort(StatusCode::FORBIDDEN);
         }

        return view('revisions.form');
    }

    public function store(RevisionRequest $request): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('create', Revision::class)){
           abort(StatusCode::FORBIDDEN);
        }

       $revision = Revision::create($request->validated());
        Toastr::success('New revision created');
        return redirect(route('revisions.show', [$revision]));
    }

    public function show(Revision $revision): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('view', Revision::class)){
            abort(StatusCode::FORBIDDEN);
        }
        return view('revisions.show', ['revision' => $revision]);
    }

    public function edit(Revision $revision): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('edit', Revision::class)){
            abort(StatusCode::FORBIDDEN);
        }

        return view('revisions.form', ['revision' => $revision]);
    }

    public function update(RevisionRequest $request, Revision $revision): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('edit', Revision::class)){
            abort(StatusCode::FORBIDDEN);
        }

        $revision->update($request->validated());
        $revision->save();

        Toastr::success('Revision modified');
        return redirect(route('revisions.show', [$revision]));
    }

    public function destroy(Revision $revision): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('delete', Revision::class)){
           abort(StatusCode::FORBIDDEN);
        }

        Toastr::warning("Revision deleted: $revision->id");
        $revision->delete();
        return redirect(route('revisions.index'));
    }
}
