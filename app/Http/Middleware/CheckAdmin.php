<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is an admin
        if(auth()->check() && auth()->user()->isAdmin) {
            return $next($request);
        }

        // Redirect or respond with an error if not an admin
        return redirect('/')->with('error', 'You do not have permission to access this page.');
    }
}
