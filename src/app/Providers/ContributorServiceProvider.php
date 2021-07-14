<?php

namespace App\Providers;

use App\Models\Article;
use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;

class ContributorServiceProvider extends ServiceProvider
{
    public function register(){}
    public function boot(){}

    /**
     * Takes an array of user emails and attaches all to an article
     * @param string[] $contributions
     * @param Article $article
     */
    public static function attachAll(array $contributions, Article $article): void {
        foreach ($contributions as $contribution) {
            $contributor = Str::of($contribution)->before( ':')->trim()->lower();
            $contribution_type = Str::of($contribution)->after( ':')->trim()->lower();
            $user = User::where('email', $contributor)->first();
            abort_if(is_null($user), 404, "Unknown user $contributor.");
            $article->users()->attach($user, ['contribution_type' => $contribution_type]);
        }
    }
}
