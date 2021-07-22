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
    /**
     * Shows the comment listing view
     * @return Factory|View|Application|RedirectResponse
     */
    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.comments.index', ['comments' => Comment::all()]);
    }

    /**
     * Shows the comment create form
     * @return Factory|View|Application|RedirectResponse
     */
    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.comments.form');
    }

    /**
     * Stores a comment in the database
     * @param CommentRequest $request
     * @return Factory|View|Application|RedirectResponse
     */
    public function store(CommentRequest $request): Factory|View|Application|RedirectResponse
    {
       $comment = Comment::create($request->validated());
        Toastr::success('New comment created');
        return redirect(route('comments.show', [$comment]));
    }

    /**
     * Shows the comment show view
     * @param Comment $comment
     * @return Factory|View|Application|RedirectResponse
     */
    public function show(Comment $comment): Factory|View|Application|RedirectResponse
    {
        return view('pages.comments.show', ['comment' => $comment]);
    }

    /**
     * Shows the comment editor form
     * @param Comment $comment
     * @return Factory|View|Application|RedirectResponse
     */
    public function edit(Comment $comment): Factory|View|Application|RedirectResponse
    {
        return view('pages.comments.form', ['comment' => $comment]);
    }

    /**
     * Updates a comment
     * @param CommentRequest $request New comment data
     * @param Comment $comment Existing comment data
     * @return Factory|View|Application|RedirectResponse
     */
    public function update(CommentRequest $request, Comment $comment): Factory|View|Application|RedirectResponse
    {
        $comment->update($request->validated());
        Toastr::success('Comment modified');
        return redirect(route('comments.show', [$comment]));
    }

    /**
     * Removes a comment from the database
     * @param Comment $comment
     * @return Factory|View|Application|RedirectResponse
     */
    public function destroy(Comment $comment): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Comment deleted: $comment->id");
        $comment->delete();
        return redirect(route('comments.index'));
    }
}
