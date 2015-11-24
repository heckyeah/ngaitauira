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

Route::get('/', 'HomeController@index');
Route::get('splash', 'SplashController@index');

Route::get('event', 'EventController@index');
Route::get('event/{id}', 'EventController@show');
Route::get('event/{id}/edit', 'EventController@edit');

Route::get('admin', 'AdminController@index');

// Admin page dynamic content routes...
Route::get('admin/footer', 'FooterAdminController@index');

// Admin page event routes...
Route::get('admin/event', 'EventAdminController@index');
Route::get('admin/event/create', 'EventAdminController@create');
Route::post('admin/event', 'EventAdminController@store');
Route::get('admin/event/{id}/edit/', 'EventAdminController@edit');
Route::post('admin/event/{id}/edit/', 'EventAdminController@update');
Route::put('admin/event/{id}/delete/', 'EventAdminController@destroy');
Route::get('admin/event/{id}/{image}/remove', 'EventAdminController@destroy');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Administration Routes...