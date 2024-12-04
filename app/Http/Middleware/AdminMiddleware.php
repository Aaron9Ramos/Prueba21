<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        $redirec = redirect(url(''));
        if (!empty(Auth::check())) {
            if (Auth::user()->user_type == 0) {
                $redirec =  $next($request);
            } else {
                Auth::logout();
                $redirec = redirect(url(''));
            }
        } else {
            Auth::logout();
            $redirec = redirect(url(''));
        }
        return $redirec;
    }
}
