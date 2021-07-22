<?php

namespace App\Http\Controllers;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use App\Utils\Bouncer;
use App\Utils\StatusCode;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class TagController extends GuardedController
{

    /**
     * Shows the tag listing page
     * @return Factory|View|Application|RedirectResponse
     */
    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.tag.index', ['tags' => Tag::all()]);
    }

    /**
     * Shows the tag create form
     * @return Factory|View|Application|RedirectResponse
     */
    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.tags.form');
    }

    /**
     * Adds a tag to the database
     * @param TagRequest $request Tag data
     * @return Factory|View|Application|RedirectResponse
     */
    public function store(TagRequest $request): Factory|View|Application|RedirectResponse
    {
       $tag = Tag::create($request->validated());
        Toastr::success('New tag created');
        return redirect(route('tags.show', [$tag]));
    }

    /**
     * Shows the tag show page
     * @param Tag $tag Tag data
     * @return Factory|View|Application|RedirectResponse
     */
    public function show(Tag $tag): Factory|View|Application|RedirectResponse
    {
        return view('pages.tags.show', ['tag' => $tag]);
    }

    /**
     * Shows the tag editor form
     * @param Tag $tag Tag data
     * @return Factory|View|Application|RedirectResponse
     */
    public function edit(Tag $tag): Factory|View|Application|RedirectResponse
    {
        return view('pages.tags.form', ['tag' => $tag]);
    }

    /**
     * Updates the tag
     * @param TagRequest $request New tag data
     * @param Tag $tag Existing tag data
     * @return Factory|View|Application|RedirectResponse
     */
    public function update(TagRequest $request, Tag $tag): Factory|View|Application|RedirectResponse
    {
        $tag->update($request->validated());
        Toastr::success('Tag modified');
        return redirect(route('tags.show', [$tag]));
    }

    /**
     * Removes a tag from the database
     * @param Tag $tag Tag data
     * @return Factory|View|Application|RedirectResponse
     */
    public function destroy(Tag $tag): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Tag deleted: $tag->id");
        $tag->delete();
        return redirect(route('tags.index'));
    }
}
