<?php
use App\Eventset;
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

//Root / Startseite View aufrufen
Route::get('/', 'IndexController@index')->name('welcome');

//Privacy View aufrufen
Route::get('privacy', function(){
    return view('privacy');

})->name('privacy');

//Contact View aufrufen
Route::get('contact', function(){
    return view('contact');

})->name('contact');


Route::get('checkout', function(){
    return view('cart.checkout');
});


//Cart View aufrufen
Route::get('cart', 'CartController@index')->name('cart');
//Tickets im Cart laufen ab
Route::post('cart', 'CartController@destroy');
//Checkout
Route::get('checkout', 'CartController@index');
Route::post('checkout', 'CartController@checkout');
Route::post('checkoutComplete', 'CartController@completeCheckout');

//Category View aufrufen
Route::get('category/{categoryname}', 'CategoryController@show')->name('category');

//Eventset View aufrufen
Route::get('event/{eventsetname}', 'EventsetController@show')->name('eventset');
//Kundenbewertung abgeben
Route::post('event/{eventsetname}', 'EventsetController@update');

//Tickets bzw. Event View aufrufen
Route::get('event/{eventsetname}/{eventnr}/tickets', 'TicketController@show')->name('tickets');
//Tickets werden in Warenkorb gelegt
Route::post('cart/{event}', 'TicketController@update');


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
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset');


//Profile View aufrufen
Route::get('profile', 'ProfileController@index')->name('profile');
//Profil bearbeiten
Route::get('editprofile', 'ProfileController@edit');
Route::post('profile', 'ProfileController@update')->name('profile');

//Email verification
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

//Password reset
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

//Admin-access (Eventset- & Event-administration)
Route::get('/admin', 'AdminController@index')->middleware('is_admin')->name('admin');
Route::post('/admin/delMod', 'AdminController@updateEventsets');
Route::post('/admin/addEventset', 'AdminController@addEventset');
Route::post('/admin/addEvent', 'AdminController@addEvent');
//Route::post('/admin/deleteEvent', 'AdminController@deleteEvent');

//Search
Route::get('/search', 'SearchController@search');



