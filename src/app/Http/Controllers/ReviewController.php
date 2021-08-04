<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Review;
use App\Utils\Bouncer;
use App\Utils\StatusCode;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class ReviewController extends GuardedController
{
    /**
     * Shows the review listing page
     * @return Factory|View|Application|RedirectResponse
     */
    public function index(): Factory|View|Application|RedirectResponse
    {
        return view('pages.reviews.index', ['reviews' => Review::all()]);
    }

    /**
     * Shows the review create form
     * @return Factory|View|Application|RedirectResponse
     */
    public function create(): Factory|View|Application|RedirectResponse
    {
        return view('pages.reviews.form');
    }

    /**
     * Creates a review
     * @param ReviewRequest $request
     * @return Factory|View|Application|RedirectResponse
     */
    public function store(ReviewRequest $request): Factory|View|Application|RedirectResponse
    {
       $review = Review::create($request->validated());
        Toastr::success('New review created');
        return redirect(route('reviews.show', [$review]));
    }

    /**
     * Shows the review show page
     * @param Review $review
     * @return Factory|View|Application|RedirectResponse
     */
    public function show(Review $review): Factory|View|Application|RedirectResponse
    {
        return view('pages.reviews.show', ['review' => $review]);
    }

    /**
     * Shows the review edit form
     * @param Review $review
     * @return Factory|View|Application|RedirectResponse
     */
    public function edit(Review $review): Factory|View|Application|RedirectResponse
    {
        return view('pages.reviews.form', ['review' => $review]);
    }

    /**
     * Updates a review in the database
     * @param ReviewRequest $request
     * @param Review $review
     * @return Factory|View|Application|RedirectResponse
     */
    public function update(ReviewRequest $request, Review $review): Factory|View|Application|RedirectResponse
    {
        $review->update($request->validated());
        $review->save();

        Toastr::success('Review modified');
        return redirect(route('reviews.show', [$review]));
    }

    /**
     * Removes a review from the database
     * @return Factory|View|Application|RedirectResponse
     */
    public function destroy(Review $review): Factory|View|Application|RedirectResponse
    {
        Toastr::warning("Review deleted: $review->id");
        $review->delete();
        return redirect(route('reviews.index'));
    }
}
