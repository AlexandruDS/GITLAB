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
 * Class WebController
 * @package App\Http\Controllers
 */
class AccountController extends Controller
{




    function login(Request $request)
    {
        $user = User::where('email', $request->input('email'))
            ->first();
        if (!$user) {
            abort(404, 'User not found');
        }
        if (!Hash::check($request->input('password'), $user->password)) {
            abort(400, 'Invalid credentials');
        }
        $request->session()->put('userId', $user->id);
        return $user;
    }

    function logout(Request $request)
    {
        $request->session()->remove('userId');
    }

    function getMyAccount(Request $request)
    {
        $page = Page::where('identifier', 'CONTACT')->first();
        $certifications = Certification::all();
        $custom = ['page' => $page->toArray(), 'certifications' => $certifications];
        return view('account.account', array_merge($this->getBasic($request), $custom));
    }

    
    function getAccount(Request $request)
    {
        $page = Page::where('identifier', 'CONTACT')->first();
        $certifications = Certification::all();
        $custom = ['page' => $page->toArray(), 'certifications' => $certifications];
        return view('account.settings', array_merge($this->getBasic($request), $custom));
    }



    function getMyDocuments(Request $request)
    {
        $page = Page::where('identifier', 'CONTACT')->first();
        $custom = ['page' => $page->toArray(), 'documents' => []];
        return view('account.documents', array_merge($this->getBasic($request), $custom));
    }

    function getMySessions(Request $request)
    {
        $page = Page::where('identifier', 'CONTACT')->first();
        $certifications = Certification::all();


        if ($request->user->is_coach) {
            $coachSessions = Session::with('user.documents')->where('user_id', $request->user->id)->get();
        } else {
            $coachSessions = [];
        }

        $studentSessions = Session::with('user.documents')->whereIn('id', SessionUser::where('user_id', $request->user->id)->pluck('session_id'))->get();

        $custom = [
            'page' => $page->toArray(),
            'certifications' => $certifications,
            'coachSessions' => $coachSessions,
            'studentSessions' => $studentSessions
        ];

        return view('account.sessions',
            array_merge($this->getBasic($request), $custom)
        );
    }
    function getMySession(Request $request, $id)
    {
        $page = Page::where('identifier', 'CONTACT')->first();
        $certifications = Certification::all();

        $session = Session::with('user.documents', 'session_users.user')->find($id);


        $custom = [
            'page' => $page->toArray(),
            'certifications' => $certifications,
            'session' => $session
        ];

        return view('account.session',
            array_merge($this->getBasic($request), $custom)
        );
    }





    function getBasic(Request $request)
    {
        $languageCode = $request->languageCode;
        $this->setLanguage($request, $languageCode);
        $texts = Text::where('language_id', $request->language->id)->get();
        $socials = Social::all();
        $services = Service::where('language_id', $request->language->id)->orderBy('ord')->get();
        $testimonials = Testimonial::where('language_id', $request->language->id)->get();
        $events = Event::where('language_id', $request->language->id)->get();
        $latestArticles = Article::with('user', 'category')->where('language_id', $request->language->id)->get();

        return ['texts' => $texts,
            'helper' => Helper::class,
            'languageCode' => $languageCode,
            'socials' => $socials,
            'services' => $services,
            'latestArticles' => $latestArticles,
            'testimonials' => $testimonials,
            'events' => $events
        ];
    }

    private function setLanguage($request, $languageCode)
    {
        if ($languageCode) {
            $language = Language::where('code', $languageCode)->first();
        } else {
            $language = Language::find(1);
        }
        $request->language = $language;
        if (!$language) {
            abort(404);
        }
    }


}
