<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
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
        $uri = $request->route()->uri;
        $type = preg_split("#/#", $uri)[0];


        if (\Auth::check()) {
            if (\Auth::user()->type != \App\Tools\UserType::TYPE_ADMIN and $type=='admin') {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
