<?php

namespace App\Http\Middleware;

use Closure;

class Test
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ('127.0.0.1' !== $request->ip()) {
            return abort(403, __('Non sei in fase di test'));
        }
        return $next($request);
    }
}
