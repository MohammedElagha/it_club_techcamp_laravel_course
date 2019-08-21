<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\AdminTokenController;

class CheckToken
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
        if (session()->has('token') && (new AdminTokenController)->check_token(session('token'))) {
            return $next($request);
        } else {
            return redirect('login');
        }
        
    }
}
