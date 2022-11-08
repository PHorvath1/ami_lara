<?php

namespace App\Http\Controllers\Admin;

use App\Actions\File\FileManager;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GuardedController;
use App\Http\Requests\ArticleCreateRequest;
use App\Models\Article;
use App\Models\Revision;
use App\Providers\CategoryServiceProvider;
use App\Http\Requests\ArticleEditRequest;
use App\Models\User;
use App\Models\Type;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleAdminController extends GuardedController
{

    //Show all articles
    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.articles.index', ['articles' =>
            Article::latest()->filter(request(['search']))->paginate(5)]);
    }

    //Show article create form
    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.articles.form', ['types' => Type::all()]);
    }

    //Store article data
    public function store(ArticleCreateRequest $request): Factory|View|Application|RedirectResponse
    {
        $rq = $request->validated();
        $userId = DB::table('users')->where('name',$request->user_name)->value('id');
        $rqe = $request->except(['categories']);
        $rqe = array_merge($rqe,array('user_id' => $userId));

        $categories = explode(',', $rq['categories']);

        if($request->hasFile('pdf')) {
            $rqe['pdf'] = $request->file('pdf')->store('pdfs', 'public');
        }
        $article = Article::create($rqe);
        CategoryServiceProvider::attachAll($categories, $article);
        Revision::create(['note' => 'Article submitted','pdf_path' => $rqe['pdf'], 'article_id' => $article->id]);
        Toastr::success('New article created');
        return redirect(route('admin:articles.show', [$article]));
    }

    //Show single article
    public function show(Article $article): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.articles.show', ['article' => $article, 'types' => Type::all()]);
    }

    //Show edit form
    public function edit(Article $article): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.articles.form', ['article' => $article, 'types' => Type::all()]);
    }

    //Update article data
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
        return redirect(route('admin:articles.show', [$article]));
    }

    //Delete article
    public function destroy(Article $article): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Article deleted: $article->id");
        $article->delete();
        return redirect(route('admin:articles.index'));
    }
}
