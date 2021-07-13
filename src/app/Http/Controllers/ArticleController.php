<?php

namespace App\Http\Controllers;

use App\Http\Middleware\BouncerCheck;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Utils\Bouncer;
use App\Utils\StatusCode;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware([BouncerCheck::class]);
    }

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
