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


Route::get('/','App\Http\Controllers\UserController@index')->name('showUser');
Route::get('user/create','App\Http\Controllers\UserController@create')->name('createUser');

Route::post('user','App\Http\Controllers\UserController@store')->name('storeUser');
Route::post('changeStatus','App\Http\Controllers\UserController@changeStatus')->name('changeStatus');

Route::post('delete/{id}','App\Http\Controllers\UserController@destroy')->name('delete_record');

Route::get('/string','App\Http\Controllers\UserController@htmlToString')->name('htmlToString');

Route::get('/dropdown',function(){
	return view('dropdown');
});

Route::post('/passcatalogid','App\Http\Controllers\UserController@passcatalogid')->name('passcatalogid');

Route::get('/duplicate/{id}','App\Http\Controllers\UserController@duplicate_record')->name('duplicate_record');