<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminOnly
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //is in Admin Table
        if (!Auth::user() || !in_array(Auth::user()->type, ['kiosk', 'finance', 'services', 'merchandise'])) { //check if no user logged in
            return redirect()->route('appointments');
        }

        if (Auth::guard('member')->user()) {
            return redirect()->route('profile');
        }
        return $next($request);
    }
}
