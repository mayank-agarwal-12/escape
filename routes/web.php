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

//Route::group(['middleware' => 'auth'], function () {

Route::get('/', 'HomeController@index');
//});

Route::get('/about', function () {
    return view('pages.about');
});

Route::get('/contact', function () {
    return view('pages.contact');
});


Auth::routes();



    Route::group(['namespace' => 'Adminpanel'], function () {

        // Authentication Routes...
        Route::get('adminpanel/login', 'Auth\LoginController@showLoginForm')->name('adminpanel/login');
        Route::post('adminpanel/login', 'Auth\LoginController@login');


       /* // Registration Routes...
        Route::get('adminpanel/register', 'Auth\RegisterController@showRegistrationForm');
        Route::post('adminpanel/register', 'Auth\RegisterController@register');*/

        // Password Reset Routes...
        Route::get('adminpanel/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
        Route::post('adminpanel/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
        Route::get('adminpanel/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
        Route::post('adminpanel/password/reset', 'Auth\ResetPasswordController@reset');





        Route::group(['middleware' => 'auth.adminpanel'], function () {

        Route::get('/adminpanel', 'HomeController@index');
        Route::post('adminpanel/logout', 'Auth\LoginController@logout');



        Route::resource('adminpanel/category','Category');
        Route::resource('adminpanel/experts','Experts');
        Route::resource('adminpanel/reviews','Reviews');
        Route::resource('adminpanel/adminuser','AdminPanelUser');
        Route::resource('adminpanel/user','User');
        Route::resource('adminpanel/testcases','TestCases');
        Route::resource('adminpanel/applicationdevices','ApplicationDevices');
        Route::resource('adminpanel/knowledgebase','KnowledgeBase');
        Route::resource('adminpanel/comparison','Comparison');

    });

});








