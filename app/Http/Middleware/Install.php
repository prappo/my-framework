<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;

class Install
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!isInstalled()) {
            if (!(Request::is('install') || Request::is('install/*'))) {

                return redirect('/install');

            }

        }
        return $next($request);
    }
}
