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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'StaticPagesController@home')->name('home');
Route::get('/help', 'StaticPagesController@help')->name('help');
Route::get('/about', 'StaticPagesController@about')->name('about');

Route::get('/signup', 'UsersController@create')->name('signup');

Route::resource('users','UsersController');

Route::get('login','SessionController@create')->name('login');
Route::post('login','SessionController@store')->name('login');
Route::delete('loginout','SessionController@destroy')->name('loginout');

Route::get('signup/confirm/{token}','UsersController@confirmEmail')->name('confirm_email');

Route::get('passport/reset','Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('passport/email','Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('passport/reset/{token}','Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('passport/reset','Auth\ResetPasswordController@reset')->name('password.update');