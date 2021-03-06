<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class RedirectIfAuthenticated
{
    public function handle($request, Closure $next, $guard = null)
    {
        // dd(Auth::guard($guard)->check());
        if ($guard == "admin" && Auth::guard($guard)->check()) {
            return redirect('/admin');
        }
        if ($guard == "lodger" && Auth::guard($guard)->check()) {
            return redirect('/lodger');
        }
        if ($guard == "manager" && Auth::guard($guard)->check()) {
            return redirect('/manager');
        }
        if ($guard == "seller" && Auth::guard($guard)->check()) {
            return redirect('/seller');
        }
        if (Auth::guard($guard)->check()) {
            return abort(403, "WHO ARE YOU?");
        }

        return $next($request);
    }
}
