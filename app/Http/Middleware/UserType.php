<?php

namespace App\Http\Middleware;

use Closure;

class UserType
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

        if (\Auth::check()) {
            if (\Auth::user()->type == \App\User::TYPE_ADMIN) {
                return redirect('/admin');
            }

            if (\Auth::user()->type == \App\User::TYPE_MANAGER) {
                return redirect('/manager');
            }
        }

        return $next($request);
    }
}
