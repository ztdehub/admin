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

//Route::get('/index', function () {
//    return view('welcome');
//});
Route::get('foo', function () {
   echo $hashed = Hash::make('bb');
});
Route::group(['middleware' =>'admin',], function () {
    Route::get('/list', 'UserController@list');
    Route::get('/sel', 'UserController@sel');
    Route::post('/add', 'UserController@add');
});

Route::get('/show', 'LoginController@show');
Route::get('/out', 'LoginController@out');
Route::post('/login', 'LoginController@login');

Route::get('/tree', 'ShopController@tree');


//Route::get('res', 'AuthController@respondWithToken');