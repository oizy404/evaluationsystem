<?php

namespace App\Http\Middleware;
use Closure;

class CheckStudentAuth
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
        if(!$request->session()->get('key')){
            return redirect()->route("front");
           //echo "gwapo ko";
        }
        return $next($request);
    }
}
