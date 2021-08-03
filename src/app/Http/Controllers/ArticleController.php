<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleEditRequest;
use App\Models\Article;
use App\Utils\Bouncer;
use App\Utils\StatusCode;
use Brian2694\Toastr\Facades\Toastr;
use FileManager;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{

    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.articles.index', ['articles' => Article::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.articles.form');
    }

    public function store(ArticleCreateRequest $request): Factory|View|Application|RedirectResponse
    {
        $rq = $request->validated();
        $rqe = $request->except(['categories', 'authors']);
        $article = Article::create($rqe);

        $categories = explode(',', $rq['categories']);
        $authors = explode(',', $rq['authors']);

        $fm = new FileManager();
        $pdf = $fm->upload('pdf', 'articles');
        $latex = $fm->upload('latex', 'articles');

        CategoryServiceProvider::attachAll($categories, $article);
        ContributorServiceProvider::attachAll($authors, $article);
        Revision::create(['pdf_path' => $pdf, 'article_id' => $article->id]);
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

    public function update(ArticleEditRequest $request, Article $article): Factory|View|Application|RedirectResponse
    {
        $rq = $request->validated();
        $rqe = $request->except(['categories', 'authors']);
        $article->update($rqe);
        $article->setStateTextAttribute($rq['state']);
        $categories = explode(',', $rq['categories']);
        $authors = explode(',', $rq['authors']);
        if ($request->has('pdf') || $request->has('latex')) {
            $fm = new FileManager();
            $pdf = $fm->upload('pdf', 'articles');
            $latex = $fm->upload('latex', 'articles');
            Revision::create(['pdf_path' => $pdf, 'article_id' => $article->id]);
        }


        CategoryServiceProvider::attachAll($categories, $article);
        ContributorServiceProvider::attachAll($authors, $article);
        Toastr::success('Article successfully updated');
        return redirect(route('articles.show', [$article]));
    }

    public function destroy(Article $article): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Article deleted: $article->id");
        $article->delete();
        return redirect(route('articles.index'));
    }
}
