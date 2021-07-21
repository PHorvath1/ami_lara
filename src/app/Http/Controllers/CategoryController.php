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
    /**
     * Redirects the user to the category listing view
     * @return Factory|View|Application|RedirectResponse
     */
    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.category.index', ['categories' => Category::all()]);
    }

    /**
     * Redirects the user to the category create form
     * @return Factory|View|Application|RedirectResponse
     */
    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.categories.form');
    }

    /**
     * Creates a category
     * @param CategoryRequest $request The create form data
     * @return Factory|View|Application|RedirectResponse
     */
    public function store(CategoryRequest $request): Factory|View|Application|RedirectResponse
    {
       $category = Category::create($request->validated());
        Toastr::success('New category created');
        return redirect(route('categories.show', [$category]));
    }

    /**
     * Redirects the user to the show category view
     * @param Category $category
     * @return Factory|View|Application|RedirectResponse
     */
    public function show(Category $category): Factory|View|Application|RedirectResponse
    {
        return view('pages.categories.show', ['category' => $category]);
    }

    /**
     * Redirects the user to the edit category form
     * @param Category $category The updated category data
     * @return Factory|View|Application|RedirectResponse
     */
    public function edit(Category $category): Factory|View|Application|RedirectResponse
    {
        return view('pages.categories.form', ['category' => $category]);
    }

    /**
     * Updates the category, then shows it to the user
     * @param CategoryRequest $request The updated category data
     * @param Category $category The existing data
     * @return Factory|View|Application|RedirectResponse
     */
    public function update(CategoryRequest $request, Category $category): Factory|View|Application|RedirectResponse
    {
        $category->update($request->validated());
        Toastr::success('Category modified');
        return redirect(route('categories.show', [$category]));
    }

    /**
     * Removes a category from the database
     * @param Category $category A category to remove
     * @return Factory|View|Application|RedirectResponse
     */
    public function destroy(Category $category): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Category deleted: $category->name");
        $category->delete();
        return redirect(route('categories.index'));
    }
}
