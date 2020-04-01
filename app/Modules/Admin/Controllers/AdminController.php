<?php

namespace App\Modules\Admin\Controllers;

use App\Http\Controllers\Controller;

/**
 * Class AdminController
 * @package App\Modules\Admin\Controllers
 */
class AdminController extends Controller
{
    function getLogin()
    {
        return view('admin.login');
    }


}
