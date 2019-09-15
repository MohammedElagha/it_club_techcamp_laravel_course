<?php

namespace App\Http\Middleware;

use Closure;
use App\UserToken;
use App\Http\Controllers\UtilityController;
use Illuminate\Support\Facades\Response;

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
        if ($request->headers->has('Token')) {
            $token = $request->header('Token');
            $user_token = UserToken::whereRaw("BINARY `token`= ?",[$token])->first();

            if (isset($user_token)) {
                return $next($request);
            }
        }

        // return $next($request);
        return Response::json((new UtilityController())->json_select([]));
    }
}
