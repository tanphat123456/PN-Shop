<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{
    public function handle($request, Closure $next)
    {
        if (session('token') && session('user')) {
            return $next($request);
        }

        return redirect()->route('dangnhap');
    }
}

