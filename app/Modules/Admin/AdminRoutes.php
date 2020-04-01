<?php


use App\Modules\Admin\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => '/admin'
], function () {

    Route::get('login', AdminController::getShortClassName() . '@getLogin');

    Route::group([
        'middleware' => 'auth',
    ], function () {
        // Route::any('auth/logout', AuthController::getShortClassName() . '@logout');
    });
});


