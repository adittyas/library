<?php

Auth::routes(['verify' => true]);



// Route::middleware(['auth','verified'])->prefix('master')->name('master.')->group(function () {
//     Route::get('pdf', 'SuperAdminController@printPdfUser')->name('printPDF');
//     Route::get('export', 'SuperAdminController@exportExcel')->name('exportExcel');
//     Route::post('import', 'SuperAdminController@importExcel')->name('importExcel');
// });

Route::middleware(['auth','verified'])->namespace('Api')->prefix('profile')->name('profile.')->group(function () {
        Route::post('{user}', 'ProfileController@updateUser')->name('acount');
    });

Route::middleware(['auth','verified'])->name('index.')->group(function ()
{
    Route::get('catalog', 'ViewController@catalog')->name('catalog');
    Route::get('guest', 'ViewController@guest')->name('guest');
    Route::get('dashboard', 'ViewController@dashboard')->name('dashboard');
    Route::get('master', 'ViewController@master')->name('master')->middleware(['role:master']);
    // master
    Route::get('book', 'ViewController@book')->name('book');
    Route::get('publisher', 'ViewController@publisher')->name('publisher');
    Route::get('member', 'ViewController@member')->name('member');
    // master
    Route::get('booking', 'ViewController@booking')->name('booking');
    Route::get('return', 'ViewController@return')->name('return');
    // profile
    Route::get('profile', 'ViewController@profile')->name('profile');

});

Route::get('token', 'ViewController@token')->name('token');

// export to excel
Route::middleware(['auth','verified'])->prefix('export')->namespace('Excel')->name('export.')->group(function ()
{
    Route::get('master','ExportController@master')->name('master')->middleware(['role:master']);
    Route::get('publisher','ExportController@publisher')->name('publisher');
    Route::get('member','ExportController@member')->name('member');
    Route::get('book','ExportController@book')->name('book');
});
// Import to excel
Route::middleware(['auth','verified'])->prefix('import')->namespace('Excel')->name('import.')->group(function ()
{
    Route::post('master','ImportController@master')->name('master')->middleware(['role:master']);
    Route::post('publisher','ImportController@publisher')->name('publisher');
    Route::post('member','ImportController@member')->name('member');
    Route::post('book','ImportController@book')->name('book');
});
// Import to excel
Route::middleware(['auth','verified'])->prefix('pdf')->namespace('Pdf')->name('pdf.')->group(function ()
{
    Route::get('master','PublishController@master')->name('master')->middleware(['role:master']);
    Route::get('publisher','PublishController@publisher')->name('publisher');
    Route::get('member','PublishController@member')->name('member');
    Route::get('book','PublishController@book')->name('book');
    Route::get('booking','PublishController@booking')->name('booking');
    Route::get('guest','PublishController@guest')->name('guest');

});

// closure
Route::get('/', function () {
    return redirect()->route('index.dashboard');
})->middleware(['auth','verified']);