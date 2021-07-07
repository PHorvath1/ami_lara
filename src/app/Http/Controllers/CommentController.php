<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Utils\Bouncer;
use App\Utils\StatusCode;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function index(): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('index', Comment::class)){
                    abort(StatusCode::FORBIDDEN);
        }

        return view('comment.index', ['comments' => Comment::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
         if(!Bouncer::can('create', Comment::class)){
            abort(StatusCode::FORBIDDEN);
         }

        return view('comments.form');
    }

    public function store(CommentRequest $request): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('create', Comment::class)){
           abort(StatusCode::FORBIDDEN);
        }

       $comment = Comment::create($request->validated());
        Toastr::success('New comment created');
        return redirect(route('comments.show', [$comment]));
    }

    public function show(Comment $comment): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('view', Comment::class)){
            abort(StatusCode::FORBIDDEN);
        }
        return view('comments.show', ['comment' => $comment]);
    }

    public function edit(Comment $comment): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('edit', Comment::class)){
            abort(StatusCode::FORBIDDEN);
        }

        return view('comments.form', ['comment' => $comment]);
    }

    public function update(CommentRequest $request, Comment $comment): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('edit', Comment::class)){
            abort(StatusCode::FORBIDDEN);
        }

        $comment->update($request->validated());
        $comment->save();

        Toastr::success('Comment modified');
        return redirect(route('comments.show', [$comment]));
    }

    public function destroy(Comment $comment): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('delete', Comment::class)){
           abort(StatusCode::FORBIDDEN);
        }

        Toastr::warning("Comment deleted: $comment->id");
        $comment->delete();
        return redirect(route('comments.index'));
    }
}
