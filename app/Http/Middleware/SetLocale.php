<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use App\Bll\ApiConnection;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(!Session::has('lang')):
            $code = ['code'=>'en'];
            $apiConnection = new ApiConnection();
            $language = $apiConnection->connect('languages', 'single', 'GET', $code);

            Session::put('lang', $language->_id);
        endif;

        return $next($request);
    }
}
