<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Modules\Api\Models\Article;
use App\Modules\Api\Models\Certification;
use App\Modules\Api\Models\Event;
use App\Modules\Api\Models\Language;
use App\Modules\Api\Models\Page;
use App\Modules\Api\Models\Partner;
use App\Modules\Api\Models\Quote;
use App\Modules\Api\Models\Service;
use App\Modules\Api\Models\Session;
use App\Modules\Api\Models\SessionUser;
use App\Modules\Api\Models\Social;
use App\Modules\Api\Models\Testimonial;
use App\Modules\Api\Models\Text;
use App\Modules\Api\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * Class SessionsController
 * @package App\Http\Controllers
 */
class SessionsController extends Controller
{

    public function store(Request $request)
    {
        $data = [
            'category_id' => 1,
            'title' => $request->json('title'),
            'content' => $request->json('content'),
            'user_id' => $request->user->id
        ];


        $session = Session::create($data);

        $participants = $request->json('participants');
        if ($participants) {
            foreach ($participants as $participant) {
                SessionUser::create([
                    'user_id' => $participant['id'],
                    'session_id' => $session->id
                ]);
            }
        }

        return Session::with('session_users.user')->find($session->id);
    }

    public function index()
    {
        return User::all();
    }


    function start(Request $request, $id)
    {
        $session = Session::findOrFail($id);

        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJhdWQiOm51bGwsImlzcyI6IlhQdktvdDhHU0V1akZhdEhCYk8tM2ciLCJleHAiOjE4OTQxODMyMDAsImlhdCI6MTU3ODU5MDI4NH0.Tj6UV4soTmwOmeYIST7IV7YNRffa7MhKj0CYWZYYTMQ'
        ];
        $body = [

            "topic" => $session->title,
            "type" => 2
        ];
        $context = stream_context_create([
            "http" => [
                // http://docs.php.net/manual/en/context.http.php
                "method" => "POST",
                "header" => implode("\r\n", $headers),
                "content" => json_encode($body),
                "ignore_errors" => true,
            ],
        ]);

        $response = file_get_contents('https://api.zoom.us/v2/users/alexandru.stoian@pathways-consulting.net/meetings', false, $context);
        $response = json_decode($response);

        $joinUrl = $response->join_url;
        $startUrl = $response->start_url;

        $session->join_url = $joinUrl;
        $session->start_url = $startUrl;
        $session->save();

        return Session::with('session_users.user')->find($session->id);
    }

    public function destroy($id)
    {
        Session::findOrFail($id)->delete();
    }

}
