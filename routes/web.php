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

Route::group(['prefix' => 'login'], function (){
    Route::get('/', 'App\HTTP\Controllers\AuthController@getLoginView')->name('login');
    Route::post('/', 'App\HTTP\Controllers\AuthController@doLogin');
});


Route::group(['prefix' => 'register'], function (){
    Route::get('/', 'App\HTTP\Controllers\AuthController@getRegisterView');
    Route::post('/', 'App\HTTP\Controllers\AuthController@doRegistration');
});

Route::get('/logout', 'App\HTTP\Controllers\AuthController@doLogout');


Route::group(['prefix' => 'contact-us',  'middleware' => []], function(){
    Route::get('/', 'App\HTTP\Controllers\ContactUsController@getContactUsView');
    Route::post('/', 'App\HTTP\Controllers\ContactUsController@saveFeedback');
});
Route::get('/','App\HTTP\Controllers\IndexController@getIndexView');

Route::group(['prefix' => '/',  'middleware' => []], function(){
    Route::get('/', 'App\HTTP\Controllers\HomeController@index');
    Route::get('/home', 'App\HTTP\Controllers\HomeController@getHomeView');
    Route::POST('/home', 'App\HTTP\Controllers\HomeController@addToCart');
});
Route::group(['prefix' => 'shopping-cart',  'middleware' => ['auth']], function(){
    Route::get('/', 'App\HTTP\Controllers\CartController@index');
    Route::post('/delete', 'App\HTTP\Controllers\CartController@deleteItemFromCart');
});
