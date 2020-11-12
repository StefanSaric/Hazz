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

Route::get('/', function () {
    return view('front.site');
});

//Logovanje
Auth::routes(['register' => false, 'logout' => false]);
Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('admin/login', function () { return view('login'); });
Route::get('login', function () { return view('login'); })->name('login');
Route::post('postlogin', 'Auth\LoginController@postLogin');

//Admin panel
Route::group(['prefix' => 'admin', 'middleware' => 'role'], function () {
    Route::get('/','Admin\AdminController@index');
    Route::resource('/products', 'Admin\ProductController');
    Route::get('/products/delete/{id}', 'Admin\ProductController@delete');
    Route::resource('/orders', 'Admin\OrdersController');
    Route::get('/orders/details/{id}', 'Admin\OrdersController@details');
});

//Front
Route::get('/', 'HomeController@index');
Route::get('/shop', 'Admin\CartController@shop');
Route::get('/blog', 'Admin\CartController@blog');
Route::get('/cart', 'Admin\CartController@cart');
Route::get('/checkout', 'Admin\CartController@checkout');
Route::get('/contact', 'Admin\CartController@contact');
Route::get('/single-product/{id}', 'Admin\ProductController@page');
Route::post('/test111', 'Admin\OrdersController@store');

//JavaScript
Route::get('/addtocart/{id}', 'HomeController@addtocart');
//Route::get('/updatecart/{id}', 'HomeController@updatecart');
Route::get('/deletecart/{id}', 'HomeController@deletecart');
