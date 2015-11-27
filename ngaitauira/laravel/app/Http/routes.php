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

Route::get('admin', 'AdminController@index');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// Admin page event routes...
Route::get('admin/{type}', 'EventAdminController@index');
Route::get('admin/{type}/create', 'EventAdminController@create');
Route::post('admin/{type}', 'EventAdminController@store');
Route::get('admin/{type}/{id}/edit/', 'EventAdminController@edit');
Route::post('admin/{type}/{id}/edit/', 'EventAdminController@update');
Route::put('admin/{type}/{id}/delete/', 'EventAdminController@destroy');
Route::get('admin/{type}/{id}/{image}/remove', 'EventAdminController@destroy');

// Event routes..
Route::get('{type}', 'EventController@index');
Route::get('{type}/{id}', 'EventController@show');
