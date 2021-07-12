<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Utils\Bouncer;
use App\Utils\StatusCode;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{

    public function index(): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('index', Category::class)){
                    abort(StatusCode::FORBIDDEN);
        }

        return view('category.index', ['categorys' => Category::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
         if(!Bouncer::can('create', Category::class)){
            abort(StatusCode::FORBIDDEN);
         }

        return view('categorys.form');
    }

    public function store(CategoryRequest $request): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('create', Category::class)){
           abort(StatusCode::FORBIDDEN);
        }

       $category = Category::create($request->validated());
        Toastr::success('New category created');
        return redirect(route('categorys.show', [$category]));
    }

    public function show(Category $category): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('view', Category::class)){
            abort(StatusCode::FORBIDDEN);
        }
        return view('categorys.show', ['category' => $category]);
    }

    public function edit(Category $category): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('edit', Category::class)){
            abort(StatusCode::FORBIDDEN);
        }

        return view('categorys.form', ['category' => $category]);
    }

    public function update(CategoryRequest $request, Category $category): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('edit', Category::class)){
            abort(StatusCode::FORBIDDEN);
        }

        $category->update($request->validated());
        $category->save();

        Toastr::success('Category modified');
        return redirect(route('categorys.show', [$category]));
    }

    public function destroy(Category $category): Factory|View|Application|RedirectResponse
    {
        if(!Bouncer::can('delete', Category::class)){
           abort(StatusCode::FORBIDDEN);
        }

        Toastr::warning("Category deleted: $category->id");
        $category->delete();
        return redirect(route('categorys.index'));
    }
}
