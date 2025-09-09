<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use RealRashid\SweetAlert\Facades\Alert;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    //variadic parameter
    public function handle(Request $request, Closure $next, ...$role): Response
    {
        if (!$request->user() || $request->user()->hasAnyRole($role)) {
          Alert::error('Upss','Anda tidak memiliki askes ke halaman ini');
            return redirect()->to('dashboard');
            // abort(403, 'Anda Tidak Punya Akses');
        }
        return $next($request);
    }
}
