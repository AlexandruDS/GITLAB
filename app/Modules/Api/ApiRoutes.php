<?php


use App\Modules\Api\Controllers\ContactController;

Route::post('/contact_footer', ContactController::getShortClassName() . '@sendContactFooter');
Route::post('/contact', ContactController::getShortClassName() . '@sendContact');

Route::group([
   // 'middleware' => ['auth'],
], function () {

    Route::group([
        'prefix' => 'admin'
    ], function () {

    });


});


