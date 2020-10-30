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

Auth::routes(['register' => false, 'logout' => false]);
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::get('admin/login', function () { return view('login'); });
Route::get('login', function () { return view('login'); })->name('login');
Route::get('/blog', function () { return view('front.blog'); });
Route::get('/contact', function () { return view('front.contact'); });


Route::get('/admin','Admin\AdminController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/products', 'Admin\ProductController');
Route::get('admin/products/delete/{id}', 'Admin\ProductController@delete');

Route::get('/', 'HomeController@index');

Route::get('/shop', 'Admin\CartController@shop');
Route::get('/cart', 'Admin\CartController@cart');
Route::get('/checkout', 'Admin\CartController@checkout');
Route::get('/single-product/{id}', 'Admin\ProductController@page');
Route::post('/test111', 'Admin\OrdersController@store');


Route::get('/addtocart/{id}', 'HomeController@addtocart');
//Route::get('/updatecart/{id}', 'HomeController@updatecart');
Route::get('/deletecart/{id}', 'HomeController@deletecart');
