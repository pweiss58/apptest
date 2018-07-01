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

//Root
Route::get('/', function () {
    return view('index');

})->name('welcome');

//Privacy
Route::get('privacy', function(){
    return view('privacy');

})->name('privacy');

//Contact
Route::get('contact', function(){
    return view('contact');

})->name('contact');

//Department
Route::get('eventset/{eventset}/{event}/{department}', 'DepartmentController@show')->name('department');
Route::post('cart/{event}/{department}', 'DepartmentController@update');

//Cart
Route::get('cart', 'CartController@index')->name('cart');
Route::post('cart', 'CartController@destroy');

//Eventset
Route::get('{eventsetname}', 'EventsetController@show')->name('eventset');


// Authentication Routes
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('logout', 'Auth\LoginController@logout');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

//Profile
Route::get('profile', 'ProfileController@index')->name('profile');
Route::get('editprofile', 'ProfileController@edit');
Route::post('profile', 'ProfileController@update')->name('profile');

//Email
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');


