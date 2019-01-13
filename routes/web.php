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
});

Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/editUserInfo', 'HomeController@editUserInfo');
Route::put('/updateUserInfo', 'HomeController@updateUserInfo');
Route::get('/products', 'HomeController@showProducts');
Route::get('/search', 'BookController@search');

//books
Route::resource('books', 'BookController');

//cart
Route::get('/addToCart/{id}', 'HomeController@addToCart');
Route::get('/shoppingCart', 'HomeController@showCart');

//checkout
Route::get('/checkout', 'HomeController@showCheckout');