<?php

namespace App\Http\Middleware;

use Closure;

class SetDatabase
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

        config(['database.connections.mysql.database' => $request->database]);
        
        return $next($request);
        
    }
}
