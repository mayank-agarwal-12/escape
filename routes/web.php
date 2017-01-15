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

//Route::group(['middleware' => 'auth'], function () {


//});




Route::get('/about', function () {
    return view('pages.about');
});


    Route::get('/', 'HomeController@index');
    Route::get('/contact', function () {
        return view('pages.contact');
    });
    Route::get('/disclaimer', function () {
        return view('pages.disclaimer');
    });
    Route::get('/about', function () {
        return view('pages.about');
    });
    Route::post('/contact','ContactUs@store');
    Route::get('/reviews', 'Reviews@index');
    Route::post('/reviews', 'Reviews@store');
    Route::get('/reviews/create', 'Reviews@create');
    Route::get('/reviews/{id}', 'Reviews@show');
    Route::post('/comments', 'Comments@store');
    Route::get('/applicationassistant', 'ApplicationDevices@index');
    Route::get('/applicationassistant/{id}', 'ApplicationDevices@show');

    Route::get('/questions', 'Questions@index');
    Route::post('/questions', 'Questions@store');
    Route::get('/questions/create', 'Questions@create');
    Route::get('/questions/{id}', 'Questions@show');
    Route::get('/comparisons', 'Comparison@index');
    Route::get('/comparisons/{name}', 'Comparison@show');

    Route::get('/knowledgebase','KnowledgeBase@index');
    Route::post('/knowledgebase','KnowledgeBase@store');
    Route::get('/knowledgebase/create','KnowledgeBase@create');
    Route::get('/knowledgebase/{id}','KnowledgeBase@show');

    Auth::routes();

    Route::group(['middleware' => 'auth'], function ()
    {
        Route::get('/profile','Profile@show');
        Route::get('/profile/reviews','Profile@showReviews');
        Route::get('/profile/questions','Profile@showQuestions');
        Route::post('/reviews/softDelete','Reviews@softDelete');
        Route::post('/reviews/removeSoftDelete','Reviews@removeSoftDelete');
        Route::post('/user/update','Profile@update');
        Route::post('/user/updatePassword','Profile@updatePassword');
    });

    Route::get('/redirect/{provider}', 'Auth\SocialAuth@redirectToProvider');
    Route::get('/callback/{provider}', 'Auth\SocialAuth@handleProviderCallback');


    Route::group(['domain' => 'adminpanel.'.env('APP_DOMAIN')], function () {




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
        Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
        Route::post('adminpanel/password/reset', 'Auth\ResetPasswordController@reset');





        Route::group(['middleware' => 'auth.adminpanel'], function () {

        Route::get('/adminpanel', 'HomeController@index');
        Route::get('/', 'HomeController@index');
        Route::post('adminpanel/logout', 'Auth\LoginController@logout');


        Route::resource('adminpanel/category','Category');
        Route::resource('adminpanel/experts','Experts');
        Route::resource('adminpanel/reviews','Reviews');
        Route::resource('adminpanel/adminuser','AdminPanelUser');

        Route::resource('adminpanel/testcases','TestCases');
        Route::resource('adminpanel/applicationdevices','ApplicationDevices');
        Route::resource('adminpanel/knowledgebase','KnowledgeBase');
        Route::resource('adminpanel/comparison','Comparison');
        Route::resource('adminpanel/answers','Answers');
            Route::resource('adminpanel/user','User');

        });
    });

});








