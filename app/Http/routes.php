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

Route::group(['middleware' => 'web'], function ()
{
    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('/', function ()
    {
        return view('welcome');
    });

    Route::get('people', 'PeopleController@index');
    Route::get('people/{person}', 'PeopleController@show');

    Route::post('people/{person}/comments', 'CommentsController@store');
    Route::delete('people/{person}/comments/{comment}', 'CommentsController@destroy');

    Route::get('createtags', function ()
    {
       \App\Quality::create(['name' => 'Communication', 'image_asset' => 'communication.png']);
       \App\Quality::create(['name' => 'Creativity', 'image_asset' => 'creativity.png']);
       \App\Quality::create(['name' => 'Knowledge', 'image_asset' => 'knowledge.png']);
       \App\Quality::create(['name' => 'Leadership', 'image_asset' => 'leadership.png']);
       \App\Quality::create(['name' => 'Passion', 'image_asset' => 'passion.png']);
       \App\Quality::create(['name' => 'Teamwork', 'image_asset' => 'teamwork.png']);
    });
});
