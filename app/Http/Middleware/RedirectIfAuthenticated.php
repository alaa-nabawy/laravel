<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $current_route = $request->route()->getName();


        $geust_routes = ['login', 'do.login'];

        if(in_array($current_route, $geust_routes)){
            if(Session::has('token')) return redirect(route('index'));
        }else{
            if (!Session::has('token')) return redirect(route('login'));
        }

        return $next($request);
    }
}
