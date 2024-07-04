<?php

namespace App\Http\Middleware;

use Closure;

class EnsureApiPrefix
{
    public function handle($request, Closure $next)
    {
        $request->server->set('REQUEST_URI', '/api' . $request->server->get('REQUEST_URI'));

        return $next($request);
    }
}
