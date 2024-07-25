<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CustomerMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && Auth::user()->email !== 'admin@gmail.com') {
            return $next($request);
        }

        return redirect('/admin/dashboard');
    }
}
