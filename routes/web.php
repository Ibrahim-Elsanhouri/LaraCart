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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'ProductController@index' ); 
Route::get('/addtocart/{id}', 'ProductController@addtocart' )->name('addtocart'); 
Route::get('shopcart','ProductController@getCart');
Route::get('/checkout' , 'ProductController@checkout');
Route::get('/profile' , 'UserController@get_profile');
Route::get('/reduce/{id}' , 'ProductController@getReduceByOne')->name('reduce');
Route::get('/remove/{id}' , 'ProductController@getRemoveItem')->name('remove');

