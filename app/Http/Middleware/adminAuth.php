<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use session;

class adminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if(!session('adminRole')){
          return  redirect('post-job');
        }
        return $next($request);
    }
}