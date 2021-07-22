<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Article;
use App\Models\Comment;
use App\Utils\Bouncer;
use App\Utils\StatusCode;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CommentController extends GuardedController
{

    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.comments.index', ['comments' => Comment::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.comments.form');
    }

    public function store(CommentRequest $request, Article $article): Factory|View|Application|RedirectResponse
    {
        $rq = $request->validated();
        $comment = Comment::create($rq);
        Toastr::success('New comment created');
        return redirect(route('articles.show', [$article]));
    }

    public function show(Comment $comment): Factory|View|Application|RedirectResponse
    {
        return view('pages.comments.show', ['comment' => $comment]);
    }

    public function edit(Comment $comment): Factory|View|Application|RedirectResponse
    {
        return view('pages.comments.form', ['comment' => $comment]);
    }

    public function update(CommentRequest $request, Comment $comment): Factory|View|Application|RedirectResponse
    {
        $comment->update($request->validated());
        Toastr::success('Comment modified');
        return redirect(route('comments.show', [$comment]));
    }

    public function destroy(Comment $comment): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Comment deleted: $comment->id");
        $comment->delete();
        return redirect(route('comments.index'));
    }
}
