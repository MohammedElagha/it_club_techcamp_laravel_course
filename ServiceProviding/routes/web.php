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
    return view('welcome');
});

Route::get('login', 'AuthController@login_page');
Route::post('login/auth', 'AuthController@login');
Route::get('home', 'HomeController@home')->middleware('admin_auth')->middleware('user_group');
Route::get('logout', 'AuthController@logout');

Route::get('category/add', 'CategoryController@create')->middleware('admin_auth')->middleware('user_group');
Route::get('category/{id}', 'CategoryController@edit')->middleware('admin_auth')->middleware('user_group');
Route::get('category', 'CategoryController@index')->middleware('admin_auth')->middleware('user_group');
Route::post('category/store', 'CategoryController@store')->middleware('admin_auth')->middleware('user_group');
Route::put('category/update/{id}', 'CategoryController@update')->middleware('admin_auth')->middleware('user_group');
Route::delete('category/delete/{id}', 'CategoryController@destroy')->middleware('admin_auth')->middleware('user_group');

Route::get('country/add', 'CountryController@create')->middleware('admin_auth')->middleware('user_group');
Route::post('country/store', 'CountryController@store')->middleware('admin_auth')->middleware('user_group');
Route::get('country', 'CountryController@index')->middleware('admin_auth')->middleware('user_group');

Route::get('city', 'CityController@index')->middleware('admin_auth')->middleware('user_group');
Route::get('city/add', 'CityController@create')->middleware('admin_auth')->middleware('user_group');
Route::post('city/store', 'CityController@store')->middleware('admin_auth')->middleware('user_group');

Route::get('country/cities', 'CityController2@get_cities_of_country')->middleware('admin_auth')->middleware('user_group');
Route::get('country/{id}/city', 'CityController2@cities_of_country')->middleware('admin_auth')->middleware('user_group');

Route::get('user-group/add', 'UserGroupController@create')->middleware('admin_auth')->middleware('user_group');
Route::post('user-group/store', 'UserGroupController@store')->middleware('admin_auth')->middleware('user_group');

Route::get('admin/add', 'AdminController@create')->middleware('admin_auth')->middleware('user_group');
Route::post('admin/store', 'AdminController@store')->middleware('admin_auth')->middleware('user_group');



Route::get('excel/category', 'ExcelController@categories')->middleware('admin_auth')->middleware('user_group');
