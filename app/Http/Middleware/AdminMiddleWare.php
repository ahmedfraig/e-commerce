<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect('/login');
        }
        // Get the authenticated user
        $user = Auth::user();//ahmed

        if ($user->role === 'admin') {
            return $next($request);
        }

        if ($user->role === 'user') {
            return redirect('/theme/front');
        }

        abort(403, 'Unauthorized');
    }

}
