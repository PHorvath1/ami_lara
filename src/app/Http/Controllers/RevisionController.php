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
    /**
     * Redirects the user to the revision listing page
     * @return Factory|View|Application|RedirectResponse
     */
    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.revisions.index', ['revisions' => Revision::all()]);
    }

    /**
     * Redirects the user to the revision create form
     * @return Factory|View|Application|RedirectResponse
     */
    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.revisions.form');
    }

    /**
     * Creates a revision
     * @param RevisionRequest $request Revision form data
     * @return Factory|View|Application|RedirectResponse
     */
    public function store(RevisionRequest $request): Factory|View|Application|RedirectResponse
    {
        $revision = Revision::create($request->validated());
        Toastr::success('New revision created');
        return redirect(route('revisions.show', [$revision]));
    }

    /**
     * Redirects the user to the show revision view
     * @param Revision $revision Revision data
     * @return Factory|View|Application|RedirectResponse
     */
    public function show(Revision $revision): Factory|View|Application|RedirectResponse
    {
        return view('pages.revisions.show', ['revision' => $revision]);
    }

    /**
     * Redirects the user to the revision editor form
     * @param Revision $revision Revision data
     * @return Factory|View|Application|RedirectResponse
     */
    public function edit(Revision $revision): Factory|View|Application|RedirectResponse
    {
        return view('pages.revisions.form', ['revision' => $revision]);
    }

    /**
     * Updates the revision
     * @param RevisionRequest $request New revision data
     * @param Revision $revision Existing revision data
     * @return Factory|View|Application|RedirectResponse
     */
    public function update(RevisionRequest $request, Revision $revision): Factory|View|Application|RedirectResponse
    {
        $revision->update($request->validated());
        Toastr::success('Revision modified');
        return redirect(route('revisions.show', [$revision]));
    }

    /**
     * Removes a revision from the database
     * @param Revision $revision Revision data
     * @return Factory|View|Application|RedirectResponse
     */
    public function destroy(Revision $revision): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Revision deleted: $revision->id");
        $revision->delete();
        return redirect(route('revisions.index'));
    }
}
