<?php

namespace App\Http\Middleware;

use App\Utils\StatusCode;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Route;

class BouncerCheck
{
    public function handle(Request $request, Closure $next)
    {
        $routeName = Str::of(Route::getCurrentRoute()->getName() ?? '');
        if ($routeName->isNotEmpty() && $routeName->contains('.')) {
            $modelName = $routeName->before('.')->afterLast(':')->title()->remove(' ')->singular();
            $model = "App\\Models\\$modelName";
            $function = $routeName->after('.')->title()->remove(' ');

            if (!Auth::check() || Auth::user()?->cannot($function, $model)) abort(StatusCode::FORBIDDEN);
        }
        return $next($request);
    }
}
