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
            if (\Auth::user()->type == \App\Tools\UserType::TYPE_ADMIN) {
                return redirect('/admin');
            }
        }

        return $next($request);
    }
}
