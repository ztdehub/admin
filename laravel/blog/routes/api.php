<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'middleware' => 'api',
], function ($router) {
    Route::post('show', 'AuthController@show');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
    Route::post('/products', 'CarController@products');
    Route::post('car', 'CarController@car');
    Route::post('number', 'CarController@number');
    Route::post('area', 'CarController@area');
});
Route::post('/goods', 'ShopController@goods');
Route::post('/product', 'CarController@product');
Route::post('/city', 'UserController@city');
Route::post('/cityadd', 'UserController@cityadd');
Route::post('/citysel', 'UserController@citysel');
Route::post('/orders', 'CarController@orders');
Route::post('/orders_add', 'CarController@orders_add');
Route::get('/pay', 'PayController@index');
Route::get('/return', 'PayController@return');
Route::get('/notify', 'PayController@notify');

Route::get('/floor', 'ShopController@floor');
Route::get('/shop', 'ShopController@sel');
Route::get('/sort', 'ShopController@sort');