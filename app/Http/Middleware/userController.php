<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class userController
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
            User::where('id','=',Auth::id())
                ->update([
                    "IP" => $_SERVER['REMOTE_ADDR']
                ]);

            if (Auth::user()->email_verified_at === null)
            {
                return redirect()->route('front.activation');
            }
        }

        return $next($request);
    }
}
