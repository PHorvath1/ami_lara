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

    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('tag.index', ['tags' => Tag::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('tags.form');
    }

    public function store(TagRequest $request): Factory|View|Application|RedirectResponse
    {
       $tag = Tag::create($request->validated());
        Toastr::success('New tag created');
        return redirect(route('tags.show', [$tag]));
    }

    public function show(Tag $tag): Factory|View|Application|RedirectResponse
    {
        return view('tags.show', ['tag' => $tag]);
    }

    public function edit(Tag $tag): Factory|View|Application|RedirectResponse
    {
        return view('tags.form', ['tag' => $tag]);
    }

    public function update(TagRequest $request, Tag $tag): Factory|View|Application|RedirectResponse
    {
        $tag->update($request->validated());
        Toastr::success('Tag modified');
        return redirect(route('tags.show', [$tag]));
    }

    public function destroy(Tag $tag): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Tag deleted: $tag->id");
        $tag->delete();
        return redirect(route('tags.index'));
    }
}
