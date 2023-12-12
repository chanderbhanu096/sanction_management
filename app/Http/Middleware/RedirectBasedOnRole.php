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
            if($user->role=='admin')
            {
                return redirect(url('admin'));
            }
            else if($user->role=='directorate')
            {
                return redirect(url('/dir'));
            }
            else 
            {
                return redirect(url('login'));
            }
        }
        else
        {

            return redirect(url('login'));
        }
        // Call the handle method on $next to continue with the pipeline
        return $next($request);
    }
      
}
