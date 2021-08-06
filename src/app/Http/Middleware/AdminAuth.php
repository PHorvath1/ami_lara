<?php

namespace App\Http\Middleware;

use App\Utils\StatusCode;
use Auth;
use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        if (Auth::user()?->isNotA('superuser', 'editor', 'technical-editor')) abort(StatusCode::FORBIDDEN);

        return $next($request);
    }
}
