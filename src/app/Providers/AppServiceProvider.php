<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\User;
use App\Utils\Bouncer;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Bouncer::ownedVia(
            Article::class,
            function(Article $article, User $subject_user){
                $user_ids = $article->users->map(fn (User $user) => $user->id);
                return $user_ids->contains($subject_user->id);
            });
        
        Paginator::useBootstrap();
    }
}
