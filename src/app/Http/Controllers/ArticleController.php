<?php

namespace App\Http\Controllers;

use App\Actions\File\FileManager;
use App\Filters\ArticleFilter;
use App\Http\Requests\ArticleCreateRequest;
use App\Http\Requests\ArticleEditRequest;
use App\Models\Article;
use App\Models\Revision;
use App\Models\Type;
use App\Providers\CategoryServiceProvider;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    /**
     * Shows the article listing page
     * @return Factory|View|Application|RedirectResponse
     */
    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.articles.index', ['articles' =>
            Article::latest()
                ->name(request(['name']))
                ->author(request(['author']))
                ->date(request(['date']))
                ->categories(request(['categories']))
                ->paginate(6)]);
    }

    /**
     * Shows the article create form
     * @return Factory|View|Application|RedirectResponse
     */
    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.articles.form', ['types' => Type::all()]);
    }

    /**
     * Creates an article
     * @return Factory|View|Application|RedirectResponse
     */
    public function store(ArticleCreateRequest $request): Factory|View|Application|RedirectResponse
    {
        $rq = $request->validated();
        $userId = DB::table('users')->where('name',$request->user_name)->value('id');
        $rqe = $request->except(['categories']);
        $rqe = array_merge($rqe,array('user_id' => $userId));
        $article = Article::create($rqe);

        $categories = explode(',', $rq['categories']);

        $fm = new FileManager();
        $pdf = $fm->upload($request, 'pdf', 'articles');
        //$latex = $fm->upload($request, 'latex', 'articles');
        CategoryServiceProvider::attachAll($categories, $article);
        Revision::create(['note' => 'Article submitted','pdf_path' => $pdf, 'article_id' => $article->id]);
        Toastr::success('New article created');
        return redirect(route('articles.show', [$article]));
    }

    /**
     * Shows the article show view
     * @param Article $article Article data
     * @return Factory|View|Application|RedirectResponse
     */
    public function show(Article $article): Factory|View|Application|RedirectResponse
    {
        return view('pages.articles.show', ['article' => $article, 'types' => Type::all()]);
    }

    /**
     * Shows the article edit form
     * @param Article $article Article data
     * @return Factory|View|Application|RedirectResponse
     */
    public function edit(Article $article): Factory|View|Application|RedirectResponse
    {
        return view('pages.articles.form', ['article' => $article, 'types' => Type::all()]);
    }

    /**
     * Updates the article
     * @param ArticleEditRequest $request New article data
     * @param Article $article Existing article data
     * @return Factory|View|Application|RedirectResponse
     */
    public function update(ArticleEditRequest $request, Article $article): Factory|View|Application|RedirectResponse
    {
        $rq = $request->validated();
        $userId = DB::table('users')->where('name',$request->user_name)->value('id');
        $rqe = $request->except(['categories']);
        $rqe = array_merge($rqe,array('user_id' => $userId));
        $article->update($rqe);
        $article->setStateTextAttribute($rq['state']);
        $categories = explode(',', $rq['categories']);
        if ($request->has('pdf') || $request->has('latex')) {
            $fm = new FileManager();
            $pdf = $fm->upload($request,'pdf', 'articles');
            //$latex = $fm->upload('latex', 'articles');
            Revision::create(['note' => 'Article submitted','pdf_path' => $pdf, 'article_id' => $article->id]);
        }

        CategoryServiceProvider::attachAll($categories, $article);
        Toastr::success('Article successfully updated');
        return redirect(route('articles.show', [$article]));
    }

    /**
     * Removes an article from the database
     * @param Article $article Article data
     * @return Factory|View|Application|RedirectResponse
     */
    public function destroy(Article $article): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Article deleted: $article->id");
        $article->delete();
        return redirect(route('articles.index'));
    }
}
