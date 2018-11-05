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

Route::get('/', ['uses' => 'VendingController@showCoin', 'as' => 'home']);
Route::get('/refund', ['uses' => 'VendingController@refund', 'as' => 'refund']);
Route::get('/select', ['uses' => 'VendingController@selectProduct', 'as' => 'select']);

Route::group(['prefix' => '/coin', 'as' => 'coin.'], function (){
    Route::get('/insert', ['uses' => 'CoinController@insertCoin', 'as' => 'insert']);
});

Route::group(['prefix' => '/product', 'as' => 'product.'], function (){
    Route::get('/', ['uses' => 'ProductController@show', 'as' => 'show']);
});