<?php

namespace App\Providers;

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
            User::class, 'id'
            //function($user, $contribution_type){
            //return $user->id == $contribution_type;
        );
        //Bouncer::allow(User::class)->toOwn(Post::class)->to('contribute');
        Paginator::useBootstrap();
    }
}
