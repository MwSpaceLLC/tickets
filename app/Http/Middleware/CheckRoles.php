<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRoles
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
        if(!Auth::check() ){
            return abort(503, __('Devi avere accesso alla pagina'));
        }

        if (!Auth::user()->active) {
            return abort(503, __('Aspetta che un admin ti dia accesso a questa pagina'));
        }

        return $next($request);
    }
}
