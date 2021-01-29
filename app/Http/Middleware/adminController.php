<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class adminController
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::check())
        {
            if (Auth::user()->permission !=1)
            {
                return redirect('/');
            }
        }
        else
        {
            return redirect('/');
        }


        return $next($request);

    }
}
