<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Administration
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user() && $request->user()->role != 'admin') {
            return response(view('pages.errors.401')->with('role', 'ADMIN'));
        }

        return $next($request);
    }
}
