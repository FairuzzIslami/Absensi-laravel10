<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request)
    {
        // sebelum ke url dia haru lewati harus login dan ke route login
        if (! $request->expectsJson()) {
            session()->flash('error', 'Anda harus login terlebih dahulu.');
            return route('login.index');
        }
    }
}
