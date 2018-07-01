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
    return view('welcome');

})->name('welcome');

//Department
Route::get('eventset/{eventset}/{event}/{department}', 'DepartmentController@show')->name('department');
Route::post('cart/{event}/{department}', 'DepartmentController@update');

//Cart
Route::get('cart', 'CartController@index')->name('cart');
Route::post('cart', 'CartController@destroy');

//Event
Route::get('events', 'EventController@show')->name('event');


//Auth Routes
Auth::routes();

//Home
Route::get('/home', 'HomeController@index')->name('home');

//Email
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

