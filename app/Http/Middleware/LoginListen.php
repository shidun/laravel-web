<?php

namespace App\Http\Middleware;

use Closure;

class LoginListen
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
        if (empty(\Auth::user())) {
            return redirect('login');
        }
        return $next($request);
    }
}
