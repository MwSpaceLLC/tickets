<?php

namespace App\Http\Middleware;

use Closure;

class ReturnHttps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->secure() && request()->getHost() !== '127.0.0.1' && config('app.ssl')) {
            return redirect()->secure($request->getRequestUri());

        }


        return $next($request);
    }
}
