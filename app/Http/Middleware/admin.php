<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()){
            if(Auth::user()->usertype == 1){
                return $next($request);
            }
            elseif(Auth::user()->usertype == 2){
                return $next($request);
            }
            else{
                return redirect('/not_found');
            }
        }
        else{
            return redirect('/not_found');
        }
        return $next($request);
    }
}
