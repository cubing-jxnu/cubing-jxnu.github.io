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

Route::any('/', function () {
    return view('welcome');
})->name('home');

Auth::routes();

Route::get('register/confirm/{token}', 'Auth\RegisterController@confirmEmail')->name('confirm.email');

Route::get('user/{user}','UserController@show')->name('user.profile');
Route::get('user/{user}/edit','UserController@edit')->name('user.edit');
Route::put('user/{user}','UserController@update')->name('user.update');

//抽奖
Route::get('tools/lottery','ToolController@lottery')->name('tool.lottery');


//比赛
Route::get('competitions/{id}', 'CompetitionController@show')->name('competition.detail');
Route::get('competitions', 'CompetitionController@index')->name('competition.list');
Route::get('competitions/{id}/signUp', 'CompetitionController@signUp')->name('competition.signUp');
Route::get('competitions/{id}/players', 'CompetitionController@players')->name('competition.players');
Route::any('competitions/{id}/resultInput/{eventId}/{round}', 'CompetitionController@resultInput')->name('competition.resultInput');
Route::any('competitions/addResult', 'CompetitionController@addResult')->name('competition.addResult');