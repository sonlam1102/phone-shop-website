<?php

namespace App\Http\Middleware;

use Closure;

class Manager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::user()->type != \App\User::TYPE_MANAGER) {
            return redirect('/');
        } else if (!\Auth::user()->manager) {
            \Auth::logout();
            return redirect('/')->back('400');
        }

        return $next($request);
    }
}
