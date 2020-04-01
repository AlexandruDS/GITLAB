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
use App\Modules\Api\Models\Social;
use App\Modules\Api\Models\Testimonial;
use App\Modules\Api\Models\Text;
use App\Modules\Api\Models\User;

use Illuminate\Http\Request;

/**
 * Class WebController
 * @package App\Http\Controllers
 */
class WebController extends Controller
{
    function getHome(Request $request)
    {

        $videos = file_get_contents("https://www.googleapis.com/youtube/v3/search?part=snippet&channelId=UCjILeAjN8kqGzgnEEWNHEcw&maxResults=6&order=date&type=video&key=AIzaSyDrP8MX7JQEX_J_GchcN2pxZE32sa7CL8s");

        //return $videos;
        $videos = json_decode($videos, true);
        $videos = $videos['items'];
        //  return $videos;

        $page = Page::where('identifier', 'HOME')->where('language_id', $request->languageId)->first();
        $partners = Partner::all();
        $quotes = Quote::all();
        $custom = ['page' => $page->toArray(), 'partners' => $partners, 'quotes' => $quotes->toArray(), 'videos' => $videos];
        return view('home', array_merge($this->getBasic($request), $custom));
    }

    function getAbout(Request $request)
    {
        $page = Page::where('identifier', 'ABOUT')->first();
        $latestArticles = [];
        $certifications = Certification::all();
        $custom = ['page' => $page->toArray(), 'latestArticles' => $latestArticles, 'certifications' => $certifications];
        return view('about', array_merge($this->getBasic($request), $custom));
    }

    function getTeam(Request $request)
    {
        $page = Page::where('identifier', 'ABOUT')->first();
        $latestArticles = [];
        $users = User::all();
        $certifications = Certification::all();
        $custom = ['page' => $page->toArray(), 'latestArticles' => $latestArticles, 'certifications' => $certifications, 'users' => $users];
        return view('team', array_merge($this->getBasic($request), $custom));
    }

    function getConfidentiality(Request $request)
    {
        $page = Page::where('identifier', 'ABOUT')->first();
        $latestArticles = [];
        $users = User::all();
        $certifications = Certification::all();
        $custom = ['page' => $page->toArray(), 'latestArticles' => $latestArticles, 'certifications' => $certifications, 'users' => $users];
        return view('confidentiality', array_merge($this->getBasic($request), $custom));
    }

    function getCookies(Request $request)
    {
        $page = Page::where('identifier', 'ABOUT')->first();
        $latestArticles = [];
        $users = User::all();
        $certifications = Certification::all();
        $custom = ['page' => $page->toArray(), 'latestArticles' => $latestArticles, 'certifications' => $certifications, 'users' => $users];
        return view('cookies', array_merge($this->getBasic($request), $custom));
    }


    function getContact(Request $request)
    {
        $message = $request->input('message');
        $languageCode = $request->languageCode;

        if ($message == 'appointment') {
            if ($languageCode == 'ro') {
                $message = 'Vreau o sedinta privata. Voi fi contactat la emailul si telefonul furnizat.';
            } else {
                $message = 'I want a private session. I will be contacted at the email and phone provided.';
            }
        }

        $page = Page::where('identifier', 'CONTACT')->first();
        $certifications = Certification::all();
        $custom = ['page' => $page->toArray(), 'certifications' => $certifications, 'message' => $message];
        return view('contact', array_merge($this->getBasic($request), $custom));
    }


    function getNews(Request $request)
    {
        $page = Page::where('identifier', 'CONTACT')->first();
        $certifications = Certification::all();
        $custom = ['page' => $page->toArray(), 'certifications' => $certifications];
        return view('news', array_merge($this->getBasic($request), $custom));
    }

    function getServices(Request $request)
    {
        $page = Page::where('identifier', 'CONTACT')->first();
        $certifications = Certification::all();
        $custom = ['page' => $page->toArray(), 'certifications' => $certifications];
        return view('services', array_merge($this->getBasic($request), $custom));
    }

    function getService(Request $request, $url)
    {

        $certifications = Certification::all();
        $service = Service::where('url', $url)->first();

        $page = [
            'title' => $service->title,
            'identifier' => 'SERVICE_PAGE',
            'meta' => 'bla'
        ];
        $custom = ['page' => $page, 'certifications' => $certifications, 'service' => $service];
        return view('service', array_merge($this->getBasic($request), $custom));
    }

    function getNew(Request $request, $url)
    {
        $article = Article::where('url', $url)->first();

        $page = [
            'title' => $article->title,
            'identifier' => 'ARTICLE_PAGE',
            'meta' => 'ad'
        ];
        $certifications = Certification::all();
        $custom = ['page' => $page, 'certifications' => $certifications, 'article' => $article];
        return view('new', array_merge($this->getBasic($request), $custom));
    }

    function getEvents(Request $request)
    {
        $page = Page::where('identifier', 'CONTACT')->first();
        $certifications = Certification::all();
        $custom = ['page' => $page->toArray(), 'certifications' => $certifications];
        return view('events', array_merge($this->getBasic($request), $custom));
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


    //API

}
