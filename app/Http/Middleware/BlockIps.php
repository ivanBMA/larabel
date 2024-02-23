<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BlockIps
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    
    public function handle(Request $request, Closure $next): Response
    {
        //return response($request->ip());
        $badips = ["80.38.55.26", "99.66.66.99"];
 
        if (in_array($request->ip(), $badips)) {
            abort(403, 'Ip no premitida');
        }
        return $next($request);// Para que el flujo de la peticion continue
    }
}
