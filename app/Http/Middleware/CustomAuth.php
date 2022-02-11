<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomAuth
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
        if(!empty(Auth::user() && (Auth::user()->userType == '1'))){
            return $next($request);

        }
        else  if(!empty(Auth::user() && (Auth::user()->userType == '0'))){
            return redirect('adminUser');

        }

        else{
            return redirect('/');

        }
    }
}
