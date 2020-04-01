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
class ServicesController extends Controller
{

    public function update(Request $request, $id)
    {
        $data = $request->json()->all();
        $item = Service::findOrFail($id);
        $item->update($data);
        $item->save();
    }

    public function store(Request $request)
    {
        return Service::create($request->json()->all());
    }

    public function index()
    {
        return Service::all();
    }

    public function destroy($id)
    {
        Service::findOrFail($id)->delete();
    }
}
