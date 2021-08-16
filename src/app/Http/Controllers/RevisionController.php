<?php

namespace App\Http\Controllers;

use App\Http\Requests\RevisionRequest;
use App\Models\Article;
use App\Models\Revision;
use App\Utils\Bouncer;
use App\Utils\StatusCode;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RevisionController extends GuardedController
{

    /**
     * Shows the revision listing page
     * @return Factory|View|Application|RedirectResponse
     */
    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.revisions.index', ['revisions' => Revision::all()]);
    }

    /**
     * Shows the revision create form
     * @return Factory|View|Application|RedirectResponse
     */
    public function create(Article $article): Factory|View|Application|RedirectResponse
    {
        return view('pages.revisions.form', ['article' => $article]);
    }

    /**
     * Creates a revision
     * @param RevisionRequest $request Revision form data
     * @return Factory|View|Application|RedirectResponse
     */
    public function store(RevisionRequest $request, Article $article): Factory|View|Application|RedirectResponse
    {
        $revision = Revision::create($request->validated());
        $revision->article_id = $article->id;
        $revision ->save();
        Toastr::success('New revision created');
        return redirect(route('revisions.show', [$revision]));
    }

    /**
     * Shows the revision show view
     * @param Revision $revision Revision data
     * @return Factory|View|Application|RedirectResponse
     */
    public function show(Revision $revision): Factory|View|Application|RedirectResponse
    {
        return view('pages.revisions.show', ['revision' => $revision]);
    }

    /**
     * Shows the revision editor form
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
