<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\SectionController;

class CheckUserGroup
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
        $url = $request->url();

        if ((new SectionController)->check($url)) {
            return $next($request);
        } else {
            return redirect()->back();
        }
        
    }
}
