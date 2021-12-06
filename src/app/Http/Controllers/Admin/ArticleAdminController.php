<?php

namespace App\Http\Controllers\Admin;

use App\Actions\File\FileManager;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GuardedController;
use App\Http\Requests\ArticleCreateRequest;
use App\Models\Article;
use App\Models\Revision;
use App\Providers\CategoryServiceProvider;
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
        return true;
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
        return true;
    }

    public function store(ArticleCreateRequest $request): Factory|View|Application|RedirectResponse
    {
        $rq = $request->validated();
        $rqe = $request->except(['categories']);
        $article = Article::create($rqe);

        $categories = explode(',', $rq['categories']);

        $fm = new FileManager();
        $pdf = $fm->upload($request, 'pdf', 'articles');
        //$latex = $fm->upload($request, 'latex', 'articles');
        CategoryServiceProvider::attachAll($categories, $article);
        Revision::create(['note' => 'Article submitted','pdf_path' => $pdf, 'article_id' => $article->id]);
        Toastr::success('New article created');
        return redirect(route('admin:articles.show', [$article]));
    }

    public function show(Article $article): Factory|View|Application|RedirectResponse
    {
        return view('pages.admin.articles.show', ['article' => $article]);
    }

    public function edit(): Factory|View|Application|RedirectResponse
    {
        return true;
    }
    public function update(): Factory|View|Application|RedirectResponse
    {
        return true;
    }
    public function destroy(): Factory|View|Application|RedirectResponse
    {
        return true;
    }
}
