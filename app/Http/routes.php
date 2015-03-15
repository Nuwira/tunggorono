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
    Route::post('user/update', ['as' => 'user-update', 'uses' => 'UserController@update']);
});

// System Info
Route::get('system', ['as' => 'system-info', 'uses' => 'SystemController@index', 'permissions' => ['system-info']]);

// Users
Route::group(['permissions' => ['users-list']], function()
{
    Route::get('users', ['as' => 'users-list', 'uses' => 'UserController@index']);
    Route::get('users/add', ['as' => 'user-add', 'uses' => 'UserController@add', 'permissions' => ['user-add']]);
    Route::get('users/info/{id}', ['as' => 'user-info', 'uses' => 'UserController@info', 'permissions' => ['user-info']]);
    Route::get('users/edit/{id}', ['as' => 'user-edit', 'uses' => 'UserController@edit', 'permissions' => ['user-edit']]);
    Route::post('user/save', ['as' => 'user-save', 'uses' => 'UserController@save']);
});

Route::controllers(
[
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
