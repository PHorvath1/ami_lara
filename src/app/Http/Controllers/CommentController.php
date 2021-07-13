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

class CommentController extends GuardedController
{

    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('comment.index', ['comments' => Comment::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('comments.form');
    }

    public function store(CommentRequest $request): Factory|View|Application|RedirectResponse
    {
       $comment = Comment::create($request->validated());
        Toastr::success('New comment created');
        return redirect(route('comments.show', [$comment]));
    }

    public function show(Comment $comment): Factory|View|Application|RedirectResponse
    {
        return view('comments.show', ['comment' => $comment]);
    }

    public function edit(Comment $comment): Factory|View|Application|RedirectResponse
    {
        return view('comments.form', ['comment' => $comment]);
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
