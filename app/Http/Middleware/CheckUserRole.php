<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            // Redirect to login if user is not authenticated
            return redirect()->route('website.home');
        }

        if (Auth::user()->role !== $role) {
            // Redirect or return an error response if user doesn't have the required role
            abort(403, 'Unauthorized action.');
        }
        return $next($request);
    }
}
