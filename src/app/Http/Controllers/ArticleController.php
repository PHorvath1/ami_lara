<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Revision;
use App\Models\Tag;
use App\Models\User;

use App\Providers\CategoryServiceProvider;
use App\Providers\ContributorServiceProvider;
use App\Providers\TagServiceProvider;

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ArticleController extends GuardedController
{
    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.articles.index', ['articles' => Article::paginate(6)]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.articles.form');
    }

    public function store(ArticleRequest $request): Factory|View|Application|RedirectResponse
    {
        $rq = $request->validated();
        $rqe = $request->except(['categories', 'tags', 'authors']);
        $article = Article::create($rqe);

        $categories = $rq['categories']->explode(',');
        $tags = $rq['tags']->explode(',');
        $authors = $rq['authors']->explode(',');
        $pdf = $request->upload('pdf', 'uploads/articles');
        $latex = $request->upload('latex', 'uploads/articles');

        CategoryServiceProvider::attachAll($categories, $article);
        TagServiceProvider::attachAll($tags, $article);
        ContributorServiceProvider::attachAll($authors, $article);
        Revision::create(['pdf_path' => $pdf, 'latex_path' => $latex, 'article_id' => $article->id]);
        Toastr::success('New article created');
        return redirect(route('articles.show', [$article]));
    }

    public function show(Article $article): Factory|View|Application|RedirectResponse
    {
        //return view('pages.articles.show', ['article' => $article, 'revisions' => Revision::all(), 'users' => User::all()]);
        return view('pages.articles.show', [ 'article' => $article ]);
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
        Revision::create(['pdf_path' => $pdf, 'latex_path' => $latex]);
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
