<?php

namespace App\Http\Middleware;

use App\Models\Basket;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class basketController
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
        if(session('basket') != null AND Auth::check() ==1)
        {
            Basket::where('token','=',session('basket'))
                ->update([
                    "userID" =>Auth::id()
                ]);
        }
        return $next($request);
    }
}
