<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if(auth()->user()->hasRole('Guru')) {
                return redirect()->route('guru.index');
            }
            elseif(auth()->user()->hasRole('admin')) {
                return redirect()->route('admin.index');
            }
            else{
                return redirect('/feed');
            }
        }

        return $next($request);
    }
}
