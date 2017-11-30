<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Laravel\Passport\ApiTokenCookieFactory;
use Laravel\Passport\Passport;

class Authenticated
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
        if(Auth::check()){

        }else{
            //return ['state'=>'UnAuthorized'];
            return redirect('/login');
        }
        return $next($request);
    }
}
