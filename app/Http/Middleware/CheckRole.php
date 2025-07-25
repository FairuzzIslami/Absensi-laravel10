<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {

        if (!Auth::check()) {
            return redirect()->route('login.index')->with('error', 'Anda harus login.');
        }

        // Cek apakah role user sesuai
        if (Auth::user()->role->nama_role !== $role) {
            return redirect()->back()->with('error','Anda tidak memiliki izin untuk mengakses halaman ini.');
        }

        return $next($request);
    }
}
