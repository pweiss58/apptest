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

//EventSet
Route::get('eventset/{eventset}/{event}/{department}', 'DepartmentController@show');
Route::post('cart/{event}/{department}', 'CartController@update');

//Event
Route::resource('events', 'EventController');
//Route::resource('departments', 'DepartmentController');
//Route::resource('users','CartController');

//Auth
Auth::routes();

//Home
Route::get('/home', 'HomeController@index')->name('home');

//Cart
Route::get('cart', 'CartController@index')->name('cart');