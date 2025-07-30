<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Administration
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next): View|Closure
    {
        if ($request->user() && $request->user()->role != 'admin') {
            return response(view('pages.errors.401')->with('role', 'ADMIN'));
        }

        return $next($request);
    }
}
