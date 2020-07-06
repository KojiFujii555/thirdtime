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

Route::get('/', 'LevelsController@index');
Route::get('second', 'LevelsController@second')->name('levels.second');
Route::get('third', 'LevelsController@third')->name('levels.third');
Route::get('buy', 'LevelsController@buy')->name('levels.buy');
Route::resource('levels', 'LevelsController');



Route::match(['get', 'post'], 'rakuten', 'LevelsController@rakuten')->name('levels.rakuten');

Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');



