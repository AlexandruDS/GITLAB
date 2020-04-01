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
class ArticlesController extends Controller
{


    public function update(Request $request, $id)
    {
        $userData = $request->json()->all();
        $user = Article::findOrFail($id);
        $user->update($userData);
        $user->save();
    }

    public function store(Request $request)
    {
        $data = $request->json()->all();
        $data['user_id'] = $request->user->id;
        return Article::create($data);
    }

    public function index()
    {
        return Article::all();
    }

    public function destroy($id)
    {
        $user = Article::findOrFail($id);
        $user->delete();
    }
}
