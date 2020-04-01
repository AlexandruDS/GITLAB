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
 * Class UsersController
 * @package App\Http\Controllers
 */
class UsersController extends Controller
{

    public function getMe(Request $request)
    {
        return $request->user;
    }

    public function updatProfile(Request $request)
    {
        $user = User::find($request->user->id);
        $user->update($request->json()->all());
    }

    public function store(Request $request)
    {
        $data = $request->json()->all();
        $data['password'] = bcrypt($request->input('password'));
        if (!isset($data['is_coach'])) {
            $data['is_coach'] = false;

        }
        $data['is_admin'] = false;
        $user = User::create($data);
        $request->session()->put('userId', $user->id);
        return $user;
    }

    public function update(Request $request, $id)
    {
        $userData = $request->json()->all();
        $user = User::findOrFail($id);
        $user->update($userData);
        $user->save();
    }

    public function index()
    {
        return User::all();
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
