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

Route::get('/', function()
{
    if (Auth::check()) {
        return redirect('dashboard');
    } else {
        return redirect('auth/login');
    }
});

Route::get('dashboard', ['as' => 'dashboard', 'uses' => 'HomeController@index']);

// Profile
Route::group(['permissions' => ['edit-profile-web']], function()
{
    Route::get('profile', ['as' => 'user-profile', 'uses' => 'UserController@profile']);
    Route::post('user/save', ['as' => 'user-save', 'uses' => 'UserController@save']);
});

Route::group(['permissions' => ['system-info']], function()
{
    Route::get('system', ['as' => 'system-info', 'uses' => 'SystemController@index']);
});

Route::controllers(
[
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
