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

Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('dashboard');
    }
    
    return redirect()->route('login.form');
});

Route::group(['namespace' => 'Web'], function () {
    
    Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function () {
        Route::get('login', 'LoginController@showLoginForm')->name('login.form');
        Route::post('login', 'LoginController@login')->name('login');
        Route::get('logout', 'LoginController@logout')->name('logout');
    });
    
    Route::group(['namespace' => 'Password', 'prefix' => 'password'], function () {
        Route::get('reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
        Route::post('email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.send');
        Route::get('reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
        Route::post('reset', 'ResetPasswordController@reset')->name('password.save');
    });
    
});

Route::get('dashboard', 'HomeController@index')->name('dashboard');