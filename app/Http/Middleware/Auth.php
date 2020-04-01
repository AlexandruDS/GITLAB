<?php

namespace App\Http\Middleware;

use App\Modules\Api\Models\User;
use Closure;

class Auth
{
    const HEADER_NAME = 'Auth-Token';
    const TOKEN_NAME = 'auth_token';

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->session()->get('userId')) {
            $request->isLoggedIn = true;
            $request->user = User::find($request->session()->get('userId'));
        } else {
            $request->isLoggedIn = false;
        }
        return $next($request);
    }
}
