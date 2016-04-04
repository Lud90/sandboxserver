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

Route::get('/admin/', function()
{
    return View::make('login');
});

Route::get('/admin/home/', function () {
    return View::make('adminhome');
});

Route::get('/admin/events', 'FP\EventController@listEvents');
Route::get('/admin/event/new', 'FP\AddEventController@addEventCreate');
Route::post('/admin/event/new', 'FP\AddEventController@store');
Route::get('/admin/event/{id}', 'FP\EventController@editEvent');
Route::get('/admin/event/{id}/registered', 'FP\EventController@registeredUsers');
Route::delete('/admin/event/delete/{id}', 'FP\EventController@deleteEvent');

Route::get('/admin/news/new', 'FP\AddNewsController@addNewsCreate');
Route::post('/admin/news/new', 'FP\AddNewsController@store');