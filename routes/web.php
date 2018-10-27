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
})->name('home');

Auth::routes();

Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail')->name('confirm.email');

Route::get('user/{user}','UserController@show')->name('user.profile');
Route::get('user/{user}/edit','UserController@edit')->name('user.edit');
Route::put('user/{user}','UserController@update')->name('user.update');