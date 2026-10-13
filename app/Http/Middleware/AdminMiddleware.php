<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(
        Request $request,
        Closure $next
    ): Response {

        // Pastikan pengguna sudah login
        if (!$request->user()) {
            return redirect()->route('login');
        }

        // Hanya Admin yang boleh membuka halaman Admin
        if ($request->user()->role !== 'admin') {
            abort(403, 'Kamu tidak memiliki akses ke halaman ini.');
        }

        return $next($request);
    }
}