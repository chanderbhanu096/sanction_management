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
        if (Auth::check()) {
            $userRole = Auth::user()->role;

            // Check the current route to avoid infinite loop
    
            $currentRoute = $request->route()->getName();
            dd("user role",$currentRoute);

            switch ($userRole) {
                case 'admin':
                    if ($currentRoute !== 'admin') {
                        return redirect('admin');
                    }
                    break;

                case 'directorate':
                    if ($currentRoute !== 'dir') {
                        return redirect('dir');
                    }
                    break;
            }
        } else {
            return redirect('/login');
        }

        return $next($request);
    }
}
