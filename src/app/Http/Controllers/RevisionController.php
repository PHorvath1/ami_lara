<?php

namespace App\Http\Controllers;

use App\Http\Requests\RevisionRequest;
use App\Models\Revision;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class RevisionController extends GuardedController
{

    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('revision.index', ['revisions' => Revision::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('revisions.form');
    }

    public function store(RevisionRequest $request): Factory|View|Application|RedirectResponse
    {
        $revision = Revision::create($request->validated());
        Toastr::success('New revision created');
        return redirect(route('revisions.show', [$revision]));
    }

    public function show(Revision $revision): Factory|View|Application|RedirectResponse
    {
        return view('revisions.show', ['revision' => $revision]);
    }

    public function edit(Revision $revision): Factory|View|Application|RedirectResponse
    {
        return view('revisions.form', ['revision' => $revision]);
    }

    public function update(RevisionRequest $request, Revision $revision): Factory|View|Application|RedirectResponse
    {
        $revision->update($request->validated());
        Toastr::success('Revision modified');
        return redirect(route('revisions.show', [$revision]));
    }

    public function destroy(Revision $revision): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Revision deleted: $revision->id");
        $revision->delete();
        return redirect(route('revisions.index'));
    }
}
