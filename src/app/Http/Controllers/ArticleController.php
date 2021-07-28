<?php

namespace App\Http\Controllers;

use App\Filters\ArticleFilter;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleEditRequest;
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
    /**
     * Shows the article listing view
     * @return Factory|View|Application|RedirectResponse
     */
    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.articles.index')->with('articles', Article::filterWith(ArticleFilter::class)->through('name', 'contributor', 'date', 'categories', 'tags')->paginate(6));
    }

    /**
     * Shows the create article form
     * @return Factory|View|Application|RedirectResponse
     */
    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.articles.form');
    }

    /**
     * Creates a new article and a revision with the file uploads
     * @param ArticleCreateRequest $request The article's data
     * @return Factory|View|Application|RedirectResponse
     */
    public function store(ArticleCreateRequest $request): Factory|View|Application|RedirectResponse
    {
        $rq = $request->validated();
        $rqe = $request->except(['categories', 'tags', 'authors']);
        $article = Article::create($rqe);

        $categories = explode(',', $rq['categories']);
        $tags = explode(',', $rq['tags'] ?? '');
        $authors = explode(',', $rq['authors']);
        $pdf = $request->upload('pdf', 'articles');
        $latex = $request->upload('latex', 'articles');

        CategoryServiceProvider::attachAll($categories, $article);
        TagServiceProvider::attachAll($tags, $article);
        ContributorServiceProvider::attachAll($authors, $article);
        Revision::create(['pdf_path' => $pdf, 'latex_path' => $latex, 'article_id' => $article->id]);
        Toastr::success('New article created');
        return redirect(route('articles.show', [$article]));
    }

    /**
     * Shows the article showing view
     * @param Article $article The article data
     * @return Factory|View|Application|RedirectResponse
     */
    public function show(Article $article): Factory|View|Application|RedirectResponse
    {
        return view('pages.articles.show', [ 'article' => $article ]);
    }

    /**
     * Shows the article editing form
     * @param Article $article The article data
     * @return Factory|View|Application|RedirectResponse
     */
    public function edit(Article $article): Factory|View|Application|RedirectResponse
    {
        return view('pages.articles.form', ['article' => $article]);
    }

    /**
     * Updates the article and creates a new revision with the updated files
     * @param ArticleEditRequest $request New article data
     * @param Article $article Existing article data
     * @return Factory|View|Application|RedirectResponse
     */
    public function update(ArticleEditRequest $request, Article $article): Factory|View|Application|RedirectResponse
    {
        $rq = $request->validated();
        $rqe = $request->except(['categories', 'tags', 'authors']);
        $article->update($rqe);
        $article->setStateTextAttribute($rq['state']);
        $categories = explode(',', $rq['categories']);
        $tags = explode(',', $rq['tags'] ?? '');
        $authors = explode(',', $rq['authors']);
        if ($request->has('pdf') || $request->has('latex')) {
            $pdf = $request->upload('pdf', 'articles');
            $latex = $request->upload('latex', 'articles');
            Revision::create(['pdf_path' => $pdf, 'latex_path' => $latex, 'article_id' => $article->id]);
        }


        CategoryServiceProvider::attachAll($categories, $article);
        TagServiceProvider::attachAll($tags, $article);
        ContributorServiceProvider::attachAll($authors, $article);
        Toastr::success('Article successfully updated');
        return redirect(route('articles.show', [$article]));
    }

    /**
     * Removes an article from the database
     * @param Article $article The article data
     * @return Factory|View|Application|RedirectResponse
     */
    public function destroy(Article $article): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Article deleted: $article->id");
        $article->delete();
        return redirect(route('articles.index'));
    }
}
