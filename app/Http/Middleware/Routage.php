<?php

namespace App\Http\Middleware;

use Closure;
use Hamcrest\Type\IsBoolean;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Routage
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, String $role)
    {

        if (Auth::user()->roles()->where('libelle', $role)->exists()) {
            // dd(Auth::user()->isActive);0
            return $next($request);
            // if(Auth::user()->isActive == false)
            // {
            //     echo "Bonjour !!!";
            // }
            // else {
            //     return $next($request);
            // }

        }
        abort(403);
        // else {
        //     //
        // }

    }
}
