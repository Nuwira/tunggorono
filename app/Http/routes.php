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

// Auth
Route::controllers(
[
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

// Dashboard
Route::get('dashboard', 
[
    'as' => 'dashboard', 
    'uses' => 'Dashboard\HomeController@index',
]);

Route::group(['namespace' => 'Administration'], function()
{
    // Profile
    Route::group(['permissions' => ['edit-profile-web']], function()
    {
        Route::get('profile', 
        [
            'as' => 'user-profile', 
            'uses' => 'UserController@profile',
        ]);
        Route::post('user/update', 
        [
            'as' => 'user-update', 
            'uses' => 'UserController@update',
        ]);
    });
    
    // Users
    Route::group(['permissions' => ['user-list']], function()
    {
        Route::get('users', 
        [
            'as' => 'users-list', 
            'uses' => 'UserController@index',
        ]);
        Route::get('user/add', 
        [
            'as' => 'user-add', 
            'uses' => 'UserController@add', 
            'permissions' => ['user-add'],
        ]);
        Route::get('user/info/{id}', 
        [
            'as' => 'user-info', 
            'uses' => 'UserController@info', 
            'permissions' => ['user-info'],
        ]);
        Route::get('user/edit/{id}', 
        [
            'as' => 'user-edit', 
            'uses' => 'UserController@edit', 
            'permissions' => ['user-edit'],
        ]);
        Route::post('user/save', 
        [
            'as' => 'user-save', 
            'uses' => 'UserController@save', 
            'permissions' => ['user-edit', 'user-add'],
        ]);
    });
    
    // System Info
    Route::get('system', 
    [
        'as' => 'system-info', 
        'uses' => 'SystemController@index', 
        'permissions' => ['system-info'],
    ]);
    
    // Roles
    Route::group(['permissions' => ['role-list']], function()
    {
        Route::get('roles', 
        [
            'as' => 'roles-list', 
            'uses' => 'RoleController@index',
        ]);
        Route::get('role/add', 
        [
            'as' => 'role-add', 
            'uses' => 'RoleController@add', 
            'permissions' => ['role-add'],
        ]);
        Route::get('role/info/{id}', 
        [
            'as' => 'role-info', 
            'uses' => 'RoleController@info', 
            'permissions' => ['role-info'],
        ]);
        Route::get('role/edit/{id}', 
        [
            'as' => 'role-edit', 
            'uses' => 'RoleController@edit', 
            'permissions' => ['role-edit'],
        ]);
        Route::post('role/save', 
        [
            'as' => 'role-save', 
            'uses' => 'RoleController@save',
        ]);
    });
});
    

