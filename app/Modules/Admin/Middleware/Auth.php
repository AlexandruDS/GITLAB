<?php

namespace App\Modules\Users\Middleware;

use App\Modules\Users\Models\Session;
use App\Modules\Users\Models\User;
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

        $token = $request->header(self::HEADER_NAME);
        if (!$token) {
            if ($request->has(self::TOKEN_NAME)) {
                $token = $request->input(self::TOKEN_NAME);
            }
        }
        if (!$token) {
            return response(['message' => 'Unauthorized'], 401);
        }

        $session = Session::where('token', '=', $token)
            ->where('expires_at', '>=', time())
            ->first();

        if ($session) {
            $user = User::find($session->user_id);
            $user->curr_session = $session;
            $request->user = $user;
        } else {
            return response(['message' => 'Unauthorized'], 401);
        }

        return $next($request);
    }
}
