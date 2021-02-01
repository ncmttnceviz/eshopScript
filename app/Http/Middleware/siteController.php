<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class siteController
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
        if (Auth::user()->permission != 2)
        {
            return redirect()->back()->with(['status'=>'alert alert-danger','message'=>'Bunun İçin Yetkiniz Yok']);
        }
        return $next($request);
    }
}
