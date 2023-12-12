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
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $user = auth()->user();
    
        // dd('Middleware is executing', $roles);

        if ($user && in_array($user->role, $roles)) {
            // dd('Middleware is executing', $user->role);

            switch ($user->role) {
                case 'admin':
                    return redirect('/admin');
                case 'directorate':
                    return redirect('/dir');
            }
        }
    
        // Call the handle method on $next to continue with the pipeline
        return $next($request);
    }
      
}
