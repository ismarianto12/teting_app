<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure; 
use App\Helpers\Properti_app;

class Level
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    { 
        $level = Auth::user()->username;  

         // dd($levelAuth);
        if ($level) {
            return $next($request);
        } else {
            return redirect(route('login'));
        }
    }
}
