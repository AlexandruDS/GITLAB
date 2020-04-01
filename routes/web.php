<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Controllers\AccountController;
use App\Http\Controllers\DocumentsController;
use App\Http\Controllers\FilesController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\UploaderController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WebController;
use App\Modules\Admin\Controllers\AdminController;
use App\Http\Controllers\TextsController;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\PagesController;




use Illuminate\Support\Facades\Route;





Route::group(['middleware' => 'ro', 'prefix' => 'ajax'], function () {

    Route::post('upload', UploaderController::getShortClassName() . '@upload');
    Route::get('files/{id}/download', FilesController::getShortClassName() . '@download');
    Route::get('image/{id}', 'FilesController@displayImage')->name('image.displayImage');

    Route::resource('users', UsersController::getShortClassName());
    Route::get('me', UsersController::getShortClassName() . '@getMe');
    Route::post('me', UsersController::getShortClassName() . '@updatProfile');
    Route::resource('texts', TextsController::getShortClassName());
    Route::resource('articles', ArticlesController::getShortClassName());
    Route::resource('services', ServicesController::getShortClassName());
    Route::resource('pages', PagesController::getShortClassName());



    Route::resource('sessions', SessionsController::getShortClassName());
    Route::resource('documents', DocumentsController::getShortClassName());

    Route::post('auth/login', AccountController::getShortClassName() . '@login');
    Route::post('auth/logout', AccountController::getShortClassName() . '@logout');

    Route::get('sessions/{id}/start', SessionsController::getShortClassName() . '@start');
});
Route::group([
    'middleware' => 'ro',
], function () {
    Route::get('/', WebController::getShortClassName() . '@getHome');
    Route::get('/despre-noi', WebController::getShortClassName() . '@getAbout');
    Route::get('/contact', WebController::getShortClassName() . '@getContact');
    Route::get('/evenimente', WebController::getShortClassName() . '@getEvents');
    Route::get('/noutati', WebController::getShortClassName() . '@getNews');
    Route::get('/noutati/{url}', WebController::getShortClassName() . '@getNew');
    Route::get('/servicii', WebController::getShortClassName() . '@getServices');
    Route::get('/servicii/{url}', WebController::getShortClassName() . '@getService');
    Route::get('/echipa-noastra', WebController::getShortClassName() . '@getTeam');
    Route::get('/politica-cookies', WebController::getShortClassName() . '@getCookies');
    Route::get('/politica-de-confidentialitate', WebController::getShortClassName() . '@getConfidentiality');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/contul-meu', AccountController::getShortClassName() . '@getMyAccount');
        Route::any('auth/logout', AccountController::getShortClassName() . '@logout');
        Route::any('sesiunile-mele', AccountController::getShortClassName() . '@getMySessions');
        Route::any('sesiunile-mele/{id}', AccountController::getShortClassName() . '@getMySession');
        Route::any('documentele-mele', AccountController::getShortClassName() . '@getMyDocuments');
        Route::any('setari-cont', AccountController::getShortClassName() . '@getAccount');



        //Administrare
        Route::any('admin', AdminController::getShortClassName() . '@getIndex');
        Route::any('admin/users', AdminController::getShortClassName() . '@getUsers');
        Route::any('admin/texts', AdminController::getShortClassName() . '@getTexts');
        Route::any('admin/articles', AdminController::getShortClassName() . '@getArticles');
        Route::any('admin/services', AdminController::getShortClassName() . '@getServices');
        Route::any('admin/pages', AdminController::getShortClassName() . '@getPages');




        

    });

});


Route::group([
    'middleware' => 'en',
], function () {
    Route::get('/home', WebController::getShortClassName() . '@getHome');
    Route::get('/events', WebController::getShortClassName() . '@getEvents');
    Route::get('/news', WebController::getShortClassName() . '@getNews');
    Route::get('/news/{url}', WebController::getShortClassName() . '@getNew');
    Route::get('/services', WebController::getShortClassName() . '@getServices');
    Route::get('/services/{url}', WebController::getShortClassName() . '@getService');
    Route::get('/about-us', WebController::getShortClassName() . '@getAbout');
    Route::get('/contact-us', WebController::getShortClassName() . '@getContact');
    Route::get('/our-team', WebController::getShortClassName() . '@getTeam');
    // Route::any('auth/logout', AuthController::getShortClassName() . '@logout');
    Route::any('my-sessions', AccountController::getShortClassName() . '@getMySessions');
    Route::any('my-sessions/{id}', AccountController::getShortClassName() . '@getMySession');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('/my-account', AccountController::getShortClassName() . '@getMyAccount');
        Route::any('auth/logout', AccountController::getShortClassName() . '@logout');
        Route::any('my-sessions', AccountController::getShortClassName() . '@getMySessions');
    });
});


