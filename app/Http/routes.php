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
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| These routes pertain to the Sandboxes API.
|
*/
Route::get('/api/news', 'API\NewsController@getNews');
Route::get('/api/news/{article_id}', 'API\NewsController@getArticle');

Route::get('/api/events', 'API\EventsController@getEvents');
Route::get('/api/events/{event_id}', 'API\EventsController@getEvent');

Route::get('/api/sandboxes', 'API\SandboxesController@getSandboxes');
Route::get('/api/sandboxes/{sandbox_id}', 'API\SandboxesController@getSandbox');

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

    Route::get('events', 'FP\EventController@listEvents');
    Route::get('event/new', 'FP\EventController@addEventCreate');
    Route::post('event/new', 'FP\EventController@store');
    Route::get('event/{id}', 'FP\EventController@editEvent');
    Route::get('event/{id}/registered', 'FP\EventController@registeredUsers');
    Route::delete('event/delete/{id}', 'FP\EventController@deleteEvent');

    Route::get('news', 'FP\NewsController@listNews');
    Route::get('news/new', 'FP\NewsController@addNewsCreate');
    Route::post('news/new', 'FP\NewsController@store');

    Route::get('/admins', 'FP\AdminController@listAdmins');
    Route::get('admin/new', 'FP\AdminController@newAdmin');
    Route::post('admin/new', 'FP\AdminController@store');
    Route::get('admin/edit/{id}', 'FP\AdminController@editAdmin');
    Route::delete('admin/delete/{id}', 'FP\AdminController@deleteAdmin');

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