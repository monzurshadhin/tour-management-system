<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if(isset(auth()->user()->is_admin)){
        if(auth()->user()->is_admin == 1){
            return $next($request);
        }
        elseif(auth()->user()->is_admin == 0){
            return $next($request);
        }
        }
        else{
            return redirect(route('login'));
        }

        return redirect('/')->with('error',"You don't have admin access.");    }
}
