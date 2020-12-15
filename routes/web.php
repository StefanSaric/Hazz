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
    Route::resource('/users', 'Admin\UserController');
    Route::resource('/products', 'Admin\ProductController');
    Route::resource('/orders', 'Admin\OrdersController');
    Route::resource('/users/edit', 'Admin\UserController@edit');
    Route::get('/users/delete/{id}', 'Admin\UserController@delete');
    Route::get('/products/delete/{id}', 'Admin\ProductController@delete');
    Route::get('/orders/details/{id}', 'Admin\OrdersController@details');
    Route::post('/orderstatus-close/{id}','Admin\OrdersController@statusdelivered');
    Route::post('/orderstatus-open/{id}','Admin\OrdersController@statusactive');
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
Route::get('/food', 'Admin\CartController@food');
Route::get('/cosmetics', 'Admin\CartController@cosmetics');


Route::post('/sendemail','Admin\EmailController@send');



//JavaScript
Route::get('/addtocart/{id}', 'HomeController@addtocart');
Route::get('/deletecart/{id}', 'HomeController@deletecart');
Route::get('/savecart/{id}/{quantity}', 'HomeController@savecart');
Route::get('/returncart', 'HomeController@returncart');

