<?php

namespace App\Http\Middleware;

use Closure;

class VerifyKey
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
        /*if (isset($request->api_key)) {
            if ($request->api_key == '1234') {
            return $next($request);
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('home');
        }*/
         return $next($request);
        
    }
}
