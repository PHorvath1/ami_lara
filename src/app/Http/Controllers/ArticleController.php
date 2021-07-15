<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Revision;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ArticleController extends GuardedController
{
    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.articles.index', ['articles' => Article::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.articles.form');
    }

    public function store(ArticleRequest $request): Factory|View|Application|RedirectResponse
    {
        $article = Article::create($request->validated());
        $pdf = $request->upload('pdf', 'uploads/articles');
        $latex = $request->upload('latex', 'uploads/articles');
        Revision::create(['pdf_path' => $pdf, 'latex_path' => $latex]);
        Toastr::success('New article created');
        return redirect(route('articles.show', [$article]));
    }

    public function show(Article $article): Factory|View|Application|RedirectResponse
    {
        return view('pages.articles.show', ['article' => $article]);
    }

    public function edit(Article $article): Factory|View|Application|RedirectResponse
    {
        return view('pages.articles.form', ['article' => $article]);
    }

    public function update(ArticleRequest $request, Article $article): Factory|View|Application|RedirectResponse
    {
        $article->update($request->validated());
        $pdf = $request->upload('pdf', 'uploads/articles');
        $latex = $request->upload('latex', 'uploads/articles');
        Revision::where('article_id', operatorOrEqualsValue: $article->id)->update(['pdf_path' => $pdf, 'latex_path' => $latex]);
        Toastr::success('Article modified');
        return redirect(route('articles.show', [$article]));
    }

    public function destroy(Article $article): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Article deleted: $article->id");
        $article->delete();
        return redirect(route('articles.index'));
    }
}
