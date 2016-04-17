<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| These routes pertain to the Sandboxes API.
|
*/

Route::group(['prefix' => 'api'], function() {
    Route::get('news', 'API\NewsController@getNews');
    Route::get('news/{article_id}', 'API\NewsController@getArticle');

    Route::get('events', 'API\EventsController@getEvents');
    Route::get('events/{event_id}', 'API\EventsController@getEvent');

    Route::get('sandboxes', 'API\SandboxesController@getSandboxes');
    Route::get('sandboxes/{sandbox_id}', 'API\SandboxesController@getSandbox');

});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| These routes pertain to the Sandboxes App Administration system.
|
*/

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth']], function() {


    Route::get('/', function () {
        return View::make('dashboard');
    })->name('dashboard');

    Route::get('dashboard', function () {
        return View::make('dashboard');
    })->name('dashboard');

    Route::resource('event', 'FP\EventController', ['except' => ['show']]);
    Route::resource('news', 'FP\NewsController', ['except' => ['show']]);
    Route::resource('admin', 'FP\AdminController', ['except' => ['show']]);

    Route::get('logout', 'FP\FPController@logout');

});

Route::group(['prefix' => 'admin', 'middleware' => ['web']], function() {
    Route::get('login', 'FP\FPController@login')->name('login');
    Route::post('login', 'FP\FPController@authenticate')->name('loginAuth');

    Route::get('password/forgot', 'Auth\PasswordController@getEmail')->name('forgotPassword');
    Route::post('password/forgot', 'Auth\PasswordController@postEmail');

    Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
    Route::post('password/reset', 'Auth\PasswordController@postReset');
});