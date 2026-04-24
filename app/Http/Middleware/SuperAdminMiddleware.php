<?php
// app/Http/Middleware/SuperAdminMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login');
        }

        if (!Auth::user()->isSuperAdmin()) {
            abort(403, 'Hanya Super Admin yang dapat mengakses halaman ini.');
        }

        return $next($request);
    }
}