<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EventScope
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            app()->instance('event_id', auth()->user()->current_event_id);
        }

        return $next($request);
    }
}
