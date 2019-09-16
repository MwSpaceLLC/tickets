<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminCheck
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
        if(!Auth::check() ){
            return abort(503, __('Devi avere accesso alla pagina'));
        }

        if (Auth::user()->role !== 1) {
            return abort(503, __('non hai accesso a questa pagina'));
        }

        return $next($request);
    }
}
