<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckGroup
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$groups): Response
    {
        if (in_array(Auth::user()->group_id, $groups)) {
            return $next($request);
        }
        Auth::logout();
        return redirect()->route('login')->with('error', 'Kesalahan saat login. Silahkan Coba lagi.');
    }
}
