<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('Api')->group(function () {
    Route::resource('/user','DataController')->only([
        'index', 'destroy', 'store', 'update' ,'edit'
    ]);
    Route::resource('/publisher','PublisherController')->only([
        'index', 'destroy', 'store', 'update' ,'edit'
    ]);
    Route::resource('/member','MemberController')->only([
        'index', 'destroy', 'store', 'update' ,'edit'
    ]);
    Route::resource('/book','BookController')->only([
        'index', 'destroy', 'store', 'update' ,'edit'
    ]);


    // Route::prefix('profile')->name('profile.')->group(function () {
    //     Route::post('{user}', 'ProfileController@updateUser')->name('acount');
    // });
});

// Route::namespace('Api')->group(function () {
//     Route::middleware('auth')->get('/data','DataController@index');
// });