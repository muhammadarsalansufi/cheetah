<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RestaurantAdmin
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
        if (Auth::guard('api')->check() && $request->user()->type == 4 ) {
            return $next($request);
        } else {
            $message = ["message" => "Permission Denied"];
            return response($message, 200);
        }
    }
}
