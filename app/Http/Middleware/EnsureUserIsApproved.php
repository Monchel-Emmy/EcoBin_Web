<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserIsApproved
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->isApproved()) {
            Auth::logout();
            return redirect('login')->with('error', 'Your account is pending approval.');
        }

        return $next($request);
    }
} 