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

Auth::routes();


Route::group(['middleware' => ['auth']], function () {

    Route::get('settings', 'HomeController@settings')->name('settings')->middleware('captcha');
    Route::get('profile', 'HomeController@profile')->name('profile');
    Route::post('profile', 'HomeController@saveProfile')->name('profile.save');
    Route::post('profile/password', 'HomeController@changePassword')->name('password.change');

    Route::get('home', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index')->name('index');


    Route::resource('user', 'Basic\UserController');
    Route::resource('menu', 'Basic\MenuController');
    Route::resource('role', 'Basic\RoleController');
    Route::resource('permission', 'Basic\PermissionController');
    Route::resource('post', 'Basic\PostController');
});
