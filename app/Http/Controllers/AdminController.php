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
 * Class AdminController
 * @package App\Http\Controllers
 */
class AdminController extends Controller
{





    function getIndex(Request $request)
    {
        $page = Page::where('identifier', 'CONTACT')->first();
        $custom = ['page' => $page->toArray(), 'documents' => []];
        return view('admin.index', array_merge($this->getBasic($request), $custom));
    }

    function getUsers(Request $request)
    {
        $page = Page::where('identifier', 'CONTACT')->first();
        $custom = ['page' => $page->toArray(), 'documents' => []];
        return view('admin.users.list', array_merge($this->getBasic($request), $custom));

    }


    function getTexts(Request $request)
    {
        $page = Page::where('identifier', 'CONTACT')->first();
        $custom = ['page' => $page->toArray()];
        return view('admin.texts.list', array_merge($this->getBasic($request), $custom));
   
    }

    function getArticles(Request $request)
    {
        $page = Page::where('identifier', 'CONTACT')->first();
        $custom = ['page' => $page->toArray()];
        return view('admin.articles.list', array_merge($this->getBasic($request), $custom));
   
    }

    function getServices(Request $request)
    {
        $page = Page::where('identifier', 'CONTACT')->first();
        $certifications = Certification::all();
        $custom = ['page' => $page->toArray(), 'certifications' => $certifications];
        return view('admin.services.list', array_merge($this->getBasic($request), $custom));
    }
    
    function getPages(Request $request)
    {
        $page = Page::where('identifier', 'CONTACT')->first();
        $certifications = Certification::all();
        $custom = ['page' => $page->toArray(), 'certifications' => $certifications];
        return view('admin.pages.list', array_merge($this->getBasic($request), $custom));
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
