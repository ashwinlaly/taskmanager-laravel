<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserLogin
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
        if((session()->get('is_logged_in') == true) || (session()->get('is_logged_in') == 1)){
            return $next($request);
        } else {
            return redirect('/');
        }
    }
}
