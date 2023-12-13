<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RedirectBasedOnRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(Auth::check())
        {
            if (Auth::user->role=='admin') {
                return redirect()->url('/admin');
            } else if (Auth::user->role=='directorate') {
                return redirect()->url('/dir');
            }
        }
        else
        {
            return view('login');
        }
    }
      
}
