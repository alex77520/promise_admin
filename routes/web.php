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

Route::get('logout', 'Auth\LoginController@logout');
Auth::routes();


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::get('settings', 'HomeController@settings')->name('settings');
    Route::get('profile', 'HomeController@profile')->name('profile');
    Route::get('home', 'HomeController@index')->name('home');
    Route::resource('user', 'Basic\UserController');
    Route::resource('menu', 'Basic\MenuController');
});
