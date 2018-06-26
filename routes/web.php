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

})->name('welcome');

/*Route::get('eventsets/{id}/events{eventNr}/departments/{departmentNr}', function($eventsetId, $eventNr, $departmentNr){
    return 'Department '.$departmentNr;
});
*/

Route::get('eventsets/{eventset}/events/{event}/departments/{department}', 'DepartmentController@showDep');


Route::resource('events', 'EventController');
//Route::resource('departments', 'DepartmentController');
Route::resource('users','CartController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');