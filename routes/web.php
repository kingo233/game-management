<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/','StaticPagesController@home')->name('home');

Route::get('signup','UsersController@create')->name('signup');
Route::resource('users', 'UsersController');
Route::get('users/{user}/confirm_die','UsersController@showdie')->name('showdie');
Route::post('users/{user}/selfdie','UsersController@selfdie')->name('selfdie');
Route::get('users/{user}/charge','UsersController@showcharge')->name('showcharge');
Route::post('users/{user}/charge','UsersController@charge')->name('charge');
Route::get('users/{user}/charge_history','UsersController@charge_history')->name('charge_history');
Route::get('users/{user}/modify_table','UsersController@showall')->name('users.showall');


Route::get('login', 'SessionsController@create')->name('login');
Route::post('login', 'SessionsController@store')->name('login');
Route::delete('logout', 'SessionsController@destroy')->name('logout');

Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');

Route::get('password/reset',  'PasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email',  'PasswordController@sendResetLinkEmail')->name('password.email');

Route::get('password/reset/{token}',  'PasswordController@showResetForm')->name('password.reset');
Route::post('password/reset',  'PasswordController@reset')->name('password.update');