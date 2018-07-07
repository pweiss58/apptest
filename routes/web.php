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

//Root / Startseite
Route::get('/', 'IndexController@index')->name('welcome');

//Privacy
Route::get('privacy', function(){
    return view('privacy');

})->name('privacy');

//Contact
Route::get('contact', function(){
    return view('contact');

})->name('contact');

//Cart
Route::get('cart', 'CartController@index')->name('cart');
Route::post('cart', 'CartController@destroy');

//Category
Route::get('category/{categoryname}', 'CategoryController@show')->name('category');

//Eventset
Route::get('event/{eventsetname}', 'EventsetController@show')->name('eventset');

//Tickets bzw. Event
Route::get('event/{eventsetname}/{eventnr}/tickets', 'TicketController@show')->name('tickets');
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
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


//Profile
Route::get('profile', 'ProfileController@index')->name('profile');
Route::get('editprofile', 'ProfileController@edit');
Route::post('profile', 'ProfileController@update')->name('profile');

//Email verification
Route::get('/user/verify/{token}', 'Auth\RegisterController@verifyUser');

//Admin-access (Eventset- & Event-administration)
Route::get('/admin', 'AdminController@admin')->middleware('is_admin')->name('admin');
Route::post('eventset/delete/{id}', 'EventsetController@destroy');
Route::post('/admin/update/eventsets', 'AdminController@updEventsets');


/*
Route::get('/eventsets/{id}',function($id){$eventset = Eventset::find($id);
    $eventset = Eventset::find($id);

    return Response::json($eventset);
});

Route::post('/tasks',function(Request $request){
    $eventset = Eventset::create($request->all());

    return Response::json($eventset);
});

Route::put('/eventsets/{id?}',function(Request $request,$id){
    $eventset = Eventset::find($id);

    $eventset->name = $request->eventset;
    $eventset->shortDescription = $request->shortDescription;

    $eventset->save();

    return Response::json($eventset);
});

Route::delete('/eventsets/{id?}',function($id){
    $eventset = Eventset::destroy($id);

    return Response::json($eventset);
});
*/

