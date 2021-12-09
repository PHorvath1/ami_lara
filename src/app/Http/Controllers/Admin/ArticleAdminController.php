<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\GuardedController;
use App\Http\Requests\ArticleEditRequest;
use App\Models\Article;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArticleAdminController extends GuardedController
{
    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.articles.index', ['article' => Article::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
        return true;
    }

    public function store(): Factory|View|Application|RedirectResponse
    {
        return true;
    }

    public function show(Article $article): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.articles.show', ['article' => $article]);
    }

    public function edit(): Factory|View|Application|RedirectResponse
    {
        return true;
    }
    public function update(ArticleEditRequest $request, Article $article): Factory|View|Application|RedirectResponse
    {
        $rq = $request->validated();
        $article->update($rq);
        $article->save();

        Toastr::success('Article successfully modified');
        return redirect(route('admin:articles.show', [$article]));
    }
    public function destroy(Article $article): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Article deleted: $article->id");
        $article->delete();
        return redirect(route('admin:articles.index'));
    }
}
