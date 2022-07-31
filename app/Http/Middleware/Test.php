<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Test
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
        if (Auth::check()) {
            if (Auth::user()->usertype=='Admin') {
                dd('This is for Admin Dashboard');
            }elseif (Auth::user()->usertype=='User') {
                dd('This is For User Dashboard');
            }
            //return $next($request);
        }else{
            //return redirect('/');
            return redirect()->back();
        }
        
    }
}
