<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class BookInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        
        if ($request->ip() != "80.38.55.26" && $request->ip() != "99.66.66.99") {
            return $next($request);
        }
            return response()->json([
                "status" => "fail",
                "message" => "you ip is banned."           
            ], 403);
        


    }
}
