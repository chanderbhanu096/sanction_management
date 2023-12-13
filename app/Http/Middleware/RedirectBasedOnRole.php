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
    public function handle(Request $request, Closure $next,...$roles): Response
    {
        
        if (Auth::check()) {
            $userRole = Auth::user()->role;
            if (in_array($userRole, $roles)) {
                return $next($request);
            }
            // Redirect to the intended role-specific path if the role is valid
            if (count($roles) > 0) {
                return redirect("/{$roles[0]}"); // Use the first role as the path
            } else {
                // Handle the case where no valid roles are provided
                abort(403, 'Unauthorized'); // You can customize the error response as needed
            }
        }
        return redirect('/login');
    }
}
