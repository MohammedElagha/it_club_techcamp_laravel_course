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

Route::get('category', 'CategoryController@index')->middleware('token');

Route::get('provider-rating', 'ProviderRatingController@show')->middleware('token');

Route::post('rating/store', 'RatingController@store')->middleware('token');

Route::get('provider', 'ProviderController@show')->middleware('token');

Route::post('login', 'LoginController@login');
