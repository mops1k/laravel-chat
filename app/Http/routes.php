<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [
        'as'   => 'home',
        'uses' => 'HomeController@index'
    ]);
    Route::get('/room/{id}', [
        'as'   => 'home.room',
        'uses' => 'HomeController@chat'
    ]);
    Route::get('/room/{id}/list', [
        'as'   => 'chat.message.list',
        'uses' => 'ChatMessageApiController@index'
    ]);
    Route::post('/room/{id}', [
        'as'   => 'chat.message.add',
        'uses' => 'ChatMessageApiController@create'
    ]);
    Route::put('/room/{id}/update',[
        'as'   => 'chat.update.online',
        'uses' => 'ChatMessageApiController@update_online'
    ]);
    Route::delete('/chat/user/delete',[
        'as'   => 'chat.delete.online',
        'uses' => 'ChatMessageApiController@delete_online'
    ]);
});

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');