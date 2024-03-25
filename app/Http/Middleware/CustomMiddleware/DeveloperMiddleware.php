<?php

namespace App\Http\Middleware\CustomMiddleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class DeveloperMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role == 'developer') {
            dd('Developer');
            return $next($request);
        } else {
            dd('Not Developer');
            toastr()->error('You are not authorized to access this page');
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
