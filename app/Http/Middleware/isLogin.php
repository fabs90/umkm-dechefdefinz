<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class isLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek dl dah login ap blom
        if (Auth::check()) {
            return $next($request);
        }
        Session::flash('custom_error', 'Silakan login terlebih dahulu!');
        // Kl belom login, pindahain ke halaman login
        return redirect(route('login'));
    }
}
