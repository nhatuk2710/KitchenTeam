<?php


use Illuminate\Support\Facades\Route;
// AdminHome
Route::get('/home','AdminController@dashboard');
//Category
Route::get('category/tableCate','AdminController@tableCate');
Route::get('category/cateCreate','AdminController@cateCreate');
Route::post('category/catepost','AdminController@catepost');
Route::get('category/cateEdit/{id}','AdminController@cateEdit');
Route::post('category/catepost/{id}','AdminController@catePostEdit');
Route::get('category/cateDestroy/{id}',"AdminController@cateDestroy");

//Brand
Route::get('brand/tableBrand','AdminController@tableBrand');
Route::get('brand/brandCreate','AdminController@brandCreate');
Route::post('brand/brandpost','AdminController@brandpost');
Route::get('brand/brandEdit/{id}','AdminController@brandEdit');
Route::post('brand/brandpost/{id}','AdminController@brandPostEdit');

//Product
Route::get('product/tableProduct','AdminController@tableProduct');
Route::get('product/productCreate','AdminController@productCreate');
Route::post('product/productpost','AdminController@productpost');
Route::get('product/productEdit/{id}','AdminController@productEdit');
Route::post('product/productpost/{id}','AdminController@productPostEdit');

Route::post('createCategory','AdminController@createCategory');
Route::post('createBrand','AdminController@createBrand');
Route::post('editBrand/','AdminController@editBrand')->name("editBrand");




//Delete


Route::get('category/brandDestroy/{id}',"AdminController@brandDestroy");

Route::get('category/productDestroy/{id}',"AdminController@productDestroy");


