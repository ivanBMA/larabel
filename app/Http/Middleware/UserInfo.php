<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserInfo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user =  Auth::guard('api')->user();

        /*
        if ($user->rol == "admin") {
            return $next($request);
        }
        */
        if ($user->rol == "user") {
            return $next($request);
        }

        return response()->json([
            "status" => "fail",
            "message" => "you are nor allowed to access."           
        ], 403);
    }
}
