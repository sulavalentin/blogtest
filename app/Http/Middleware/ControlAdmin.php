<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class ControlAdmin
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
        if (Session::get('admin')==0) {
            return redirect('/');
        }
        return $next($request);
    }
}
