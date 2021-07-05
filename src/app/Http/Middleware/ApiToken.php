<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Utils\StatusCode;
use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ApiToken
{
    public function handle(Request $request, Closure $next)
    {
        if(!$request->hasHeader('Authorization')) {
            abort(StatusCode::UNAUTHORIZED);
        }
        $header = $request->header('Authorization');

        $header = Str::remove('Token ', $header);

        /** @var User $user */
        $user = User::find(Str::before($header, ' '));

        if(!$user || !$user->validate(Str::after($header, ' '))){
            abort(StatusCode::FORBIDDEN);
        }

        Auth::login($user);
        if(!Auth::check()){
            abort(StatusCode::FORBIDDEN);
        }

        return $next($request);
    }
}
