<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends GuardedController
{
    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.category.index', ['categories' => Category::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.categories.form');
    }

    public function store(CategoryRequest $request): Factory|View|Application|RedirectResponse
    {
       $category = Category::create($request->validated());
        Toastr::success('New category created');
        return redirect(route('categories.show', [$category]));
    }

    public function show(Category $category): Factory|View|Application|RedirectResponse
    {
        return view('pages.categories.show', ['category' => $category]);
    }

    public function edit(Category $category): Factory|View|Application|RedirectResponse
    {
        return view('pages.categories.form', ['category' => $category]);
    }

    public function update(CategoryRequest $request, Category $category): Factory|View|Application|RedirectResponse
    {
        $category->update($request->validated());
        Toastr::success('Category modified');
        return redirect(route('categories.show', [$category]));
    }

    public function destroy(Category $category): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Category deleted: $category->name");
        $category->delete();
        return redirect(route('categories.index'));
    }
}
