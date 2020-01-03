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
    Route::resource('/master','DataController')->only([
        'index', 'destroy', 'store', 'update' ,'edit'
    ]);
    Route::resource('/publisher','PublisherController')->only([
        'index', 'destroy', 'store', 'update' ,'edit'
    ]);
    Route::resource('/member','MemberController')->only([
        'index', 'destroy', 'store', 'update' ,'edit'
    ]);
    Route::resource('/book','BookController')->only([
        'index', 'create','destroy', 'store', 'update' ,'edit'
    ]);
    Route::resource('/booking','BookingController')->only([
        'index', 'create','destroy', 'store', 'update' ,'edit'
    ]);
    Route::resource('/guest','GuestController')->only([
        'index','destroy', 'store'
    ]);
    Route::prefix('/renew')->group(function () {
        Route::post('/{booking}', 'BookingController@renew')->name('booking.renew');
    });
    Route::prefix('/fullfill')->group(function () {
        Route::post('/{booking}', 'BookingController@fullfill')->name('booking.fullfill');
    });
    Route::prefix('stock_in')->group(function () {
        Route::post('', 'BookController@storeIn')->name('book.stockIn');
        Route::get('{stock}/edit', 'BookController@editIn')->name('book.editIn');
        Route::delete('{stock}', 'BookController@destroyIn')->name('book.destroyIn');
        Route::patch('{stock}', 'BookController@updateIn')->name('book.updateIn');
    });
    Route::prefix('stock_out')->group(function () {
        Route::post('', 'BookController@storeOut')->name('book.stockOut');
        Route::get('{stock}/edit', 'BookController@editOut')->name('book.editOut');
        Route::delete('{stock}', 'BookController@destroyOut')->name('book.destroyOut');
        Route::patch('{stock}', 'BookController@updateOut')->name('book.updateOut');
    });

});


Route::get('/mata', function(Request $request) {
    dd($request->user('api'));
});
Route::get('token', 'ViewController@token')->name('token');

// Route::namespace('Api')->group(function () {
//     Route::middleware('auth')->get('/data','DataController@index');
// });