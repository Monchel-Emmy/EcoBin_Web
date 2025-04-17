<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect('login');
        }

        $user = Auth::user();
        
        if (!$user->is_approved) {
            Auth::logout();
            return redirect('login')->with('error', 'Your account is pending approval.');
        }

        if (!in_array($user->role, $roles)) {
            return redirect()->back()->with('error', 'Unauthorized access.');
        }

        return $next($request);
    }
} 