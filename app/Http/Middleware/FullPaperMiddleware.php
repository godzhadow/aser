<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class FullPaperMiddleware
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
        if(Auth::check()) {
            if($request->user()->jenis_user=='full paper')
            {
                return $next($request);
            }else{
                return redirect('/login');
            }
        }

        return redirect('/login');
    }
}
