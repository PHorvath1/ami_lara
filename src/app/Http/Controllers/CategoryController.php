<?php

namespace App\Http\Controllers;

use App\Http\Middleware\BouncerCheck;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(BouncerCheck::class);
    }

    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('category.index', ['categorys' => Category::all()]);
    }

    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('categorys.form');
    }

    public function store(CategoryRequest $request): Factory|View|Application|RedirectResponse
    {
       $category = Category::create($request->validated());
        Toastr::success('New category created');
        return redirect(route('categorys.show', [$category]));
    }

    public function show(Category $category): Factory|View|Application|RedirectResponse
    {
        return view('categorys.show', ['category' => $category]);
    }

    public function edit(Category $category): Factory|View|Application|RedirectResponse
    {
        return view('categorys.form', ['category' => $category]);
    }

    public function update(CategoryRequest $request, Category $category): Factory|View|Application|RedirectResponse
    {
        $category->update($request->validated());
        Toastr::success('Category modified');
        return redirect(route('categorys.show', [$category]));
    }

    public function destroy(Category $category): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Category deleted: $category->id");
        $category->delete();
        return redirect(route('categorys.index'));
    }
}
