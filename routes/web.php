<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});

Route::get('adminpanel1', function () {
    return view('vendor.iron-summit-media.index');
})->middleware('guest');

Auth::routes();

//Route::group(['middleware' => 'auth'], function () {

    Route::group(['namespace' => 'Adminpanel'], function () {

        Route::get('/adminpanel', 'HomeController@index');


        Route::get('/adminpanel/login', function () {
            return view('pages.adminpanel.login');
        });

        Route::resource('adminpanel/category','Category');
        Route::resource('adminpanel/experts','Experts');
        Route::resource('adminpanel/reviews','Reviews');
/*        Route::resource('adminpanel/users','Users');
        Route::resource('adminpanel/comparison','Comparison');*/
    });

//});








