<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockDominio
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $badhost = ["google.com", "manga.com"];
        
        if (in_array($request->host(), $badhost)) {
            abort(403, 'host no permitida');
        }
        return $next($request);
    }
}
