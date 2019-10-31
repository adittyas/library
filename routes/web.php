<?php

Auth::routes(['verify' => true]);

Route::get('/dashboard', function () {
    return view('page.dashboard');
})->middleware(['auth','verified'])->name('dashboard');

Route::resource('profile', 'ProfileController')->only([
    'index'
])->middleware(['auth','verified']);

Route::resource('master', 'SuperAdminController')->only([
    'index'
])->middleware(['auth','verified']);

Route::get('/', function () {
    return redirect()->route('dashboard');
})->middleware(['auth','verified']);


// Route::get('/home', 'HomeController@index')->name('home');