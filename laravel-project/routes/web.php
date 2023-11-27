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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/home/delete', 'HomeController@delete')->name('home.delete');
Route::get('/unsubscribe', 'UnsubscribeController@show')->name('unsubscribe.show');

Route::get('/top', 'TopController@show')->name('top.show');
Route::post('/search', 'TopController@search')->name('top.search');
Route::get('/result/{area_id}/{os_id}', 'TopController@result')->name('top.result');



Route::get('/shop/new', 'ShopController@new')->name('shop.new');
Route::post('/shop/store', 'ShopController@store')->name('shop.store');
Route::get('/shop/{id}/edit', 'ShopController@edit')->name('shop.edit');
Route::post('/shop/{id}/update', 'ShopController@update')->name('shop.update');
Route::get('/shop/{id}/show', 'ShopController@show')->name('shop.show');
Route::post('/shop/{id}/favorite', 'ShopController@favorite')->name('shop.favorite');


Route::get('/contact', 'ContactController@show')->name('contact.show');
Route::get('/transaction', 'TransactionController@show')->name('transaction.show');
Route::get('/privacy', 'PrivacyController@show')->name('privacy.show');
Route::get('/rule', 'RuleController@show')->name('rule.show');
Route::get('/info', 'InfoController@show')->name('info.show');
