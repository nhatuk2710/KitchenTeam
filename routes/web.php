<?php

use Illuminate\Support\Facades\Route;
//Route for admin
Route :: prefix("admin")->middleware("check_admin")->group(function (){
    include_once ("admin.php");
});

//Route::prefix("login")->middleware("auth")->group(function (){
//    include_once ("auth/layouts/register.blade.php");
//});
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

Route::post("postLogin","WebController@postLogin");
Route::get('/','WebController@home');
Route::get('listingCate/{id}','WebController@listingcate');

Route::get('listingBrand/{id}','WebController@listingBrand');
Route::get('/product/{id}','WebController@product');
Route::get("/shopping/{id}","WebController@shopping")->middleware("auth");
Route::post("/shopping/{id}","WebController@pshopping")->middleware("auth");
Route::get('cart','WebController@cart')->middleware('auth');
Route::get("/reduceOne/{id}","WebController@reduceOne")->middleware("auth");
Route::get("/increaseOne/{id}","WebController@increaseOne")->middleware("auth");
//Route::get("/reduceOne/{id}","WebController@reduceOne")->middleware("auth");
//Route::get("/increaseOne/{id}","WebController@increaseOne")->middleware("auth");
Route::get("/increase/{id}","WebController@increase")->middleware("auth");
Route::post("updateCart",'WebController@updateCart')->middleware("auth");
Route::get("/deleteItemCart/{id}","WebController@deleteItemCart");
Route::get("/clear-cart","WebController@clearCart")->middleware("auth");
Route::get("/check-out","WebController@checkout")->middleware('verified');
Route::post("/check-out","WebController@placeOrder")->middleware('verified');
Route::get("checkout-success","WebController@checkoutSuccess")->middleware('verified') ;
//Route::get("cancelBill","WebController@@cancelbill");
Route::get("oldBill","WebController@oldBill")->middleware('verified');
Route::get("orderDetails/{id}","WebController@orderDetails")->name('orderDetails')->middleware("signed")->middleware('verified');
Route::get("deleteOrder/{id}","WebController@deleteOrder")->name('deleteOrder')->middleware("signed")->middleware('verified');
Route::get("repurchase/{id}","WebController@repurchase")->middleware('verified');
Route::get("feedback/{o}/{id}","WebController@feedback")->name('feedback')->middleware("signed");
Route::post("feedback","WebController@postFeedback");

Route::get('/profile','WebController@profile')->middleware("auth");
Route::post("/upProfile","WebController@upProfile");
Route::post("upAvt","WebController@upAvt");

Route::post('postPromotion','WebController@postPromotion');
Route::get("test",function (){
    $cart = session()->get('cart');
 return view('email.OrderCancel');
});

Route::get('/logout', function (){
    \Illuminate\Support\Facades\Auth::logout();
    session()->flush();
    return redirect()->to("/");
});

Auth::routes(['verify' => true]);

Route::get('chart-line', 'ChartController@chartLine');
Route::get('chart-line-ajax', 'ChartController@chartLineAjax');
Route::get('comment','WebController@comment');
Route::post('comment','WebController@postComment');


Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

Route::get('/auth/{provider}', 'SocialAuthController@redirectToProvider');
Route::get('/auth/{provide}/callback', 'SocialAuthController@handleProviderCallback');

