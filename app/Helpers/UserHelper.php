<?php


namespace App\Helpers;


use App\Modules\Users\Middleware\Auth;
use App\Modules\Users\Models\Session;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserHelper
{

    public static function getUser(Request $request)
    {
        $externalIp = $_SERVER['REMOTE_ADDR'];
        $internalIp = $request->ip();

        $session = Session::where(function ($q) use ($request) {
            $q->where('token', '=', $request->header(Auth::HEADER_NAME))
                ->orWhere('token', '=', $request->input(Auth::TOKEN_NAME));
        })
            ->where('expires_at', '>', Carbon::now())
            ->where('external_ip', $externalIp)
            ->where('internal_ip', $internalIp)
            ->first();


        if (!$session) {
            return Responser::throwErrors(401, 'You are not logged in');
        }
        else
        {
            $user = $session->user_id;
        }

        return $user;
    }



}