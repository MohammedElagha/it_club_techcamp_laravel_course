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

Route::get('test', 'TestController@test');
Route::get('index', 'TestController@index');

Route::get('blog', 'BlogController@index');

Route::get('form/view/add', 'FormController@add_form');
Route::post('form/handle/add', 'FormController@handle_add_form');
