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

class TagController extends Controller
{

    public function index(): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('index', Tag::class)){
                    abort(StatusCode::FORBIDDEN);
        }

        return view('tag.index', ['tags' => Tag::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
         if(!Bouncer::can('create', Tag::class)){
            abort(StatusCode::FORBIDDEN);
         }

        return view('tags.form');
    }

    public function store(TagRequest $request): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('create', Tag::class)){
           abort(StatusCode::FORBIDDEN);
        }

       $tag = Tag::create($request->validated());
        Toastr::success('New tag created');
        return redirect(route('tags.show', [$tag]));
    }

    public function show(Tag $tag): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('view', Tag::class)){
            abort(StatusCode::FORBIDDEN);
        }
        return view('tags.show', ['tag' => $tag]);
    }

    public function edit(Tag $tag): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('edit', Tag::class)){
            abort(StatusCode::FORBIDDEN);
        }

        return view('tags.form', ['tag' => $tag]);
    }

    public function update(TagRequest $request, Tag $tag): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('edit', Tag::class)){
            abort(StatusCode::FORBIDDEN);
        }

        $tag->update($request->validated());
        $tag->save();

        Toastr::success('Tag modified');
        return redirect(route('tags.show', [$tag]));
    }

    public function destroy(Tag $tag): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('delete', Tag::class)){
           abort(StatusCode::FORBIDDEN);
        }

        Toastr::warning("Tag deleted: $tag->id");
        $tag->delete();
        return redirect(route('tags.index'));
    }
}
