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
    /**
     * Checks if the user has permission to execute a function in the current model
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $routeName = Str::of(Route::getCurrentRoute()->getName() ?? '');
        if ($routeName->isNotEmpty() && $routeName->contains('.')) {
            $className = $routeName->before('.')->title()->remove(' ')->singular();
            if ($className->contains(':')) $className = $className->after(':');

            $model = "App\\Models\\$className";
            $function = $routeName->after('.')->title()->remove(' ');

            if (!Auth::check() || Auth::user()?->cannot($function, $model)) abort(StatusCode::FORBIDDEN);
        }
        return $next($request);
    }
}
