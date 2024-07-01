<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {



        if(Auth::user()->user_type != 'admin'){
            return redirect('/');
        }
        return $next($request);


        // if(!empty(Auth::check()))
        // {
        //     if(Auth::user()->user_type === 'admin'){
        //         return $next($request);
        //     }else{
        //         Auth::logout();
        //         return redirect()->back();
        //     }
        // }
        // else{
        //     Auth::logout();
        //     return redirect()->back();
        // }
    }
}
