<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Admins;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     return $next($request);
    // }

    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 1) {
            // Authorized as admin, so redirect to the admin panel  
            // dd('ddd');
            return view('template.pages.tables');
        } else {
            // Not authorized, redirect to the home page or another appropriate URL.
            return redirect('/');
        }
    }
}
