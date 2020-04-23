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

Route::get('/','WebController@home');
Route::get('/product','WebController@product');
Route::get('/listcate','WebController@listCate');
Route::get('/listbrand','WebController@listBrand');
Route::get('/cart','WebController@cart');
Route::get('/checkout','WebController@checkout');
