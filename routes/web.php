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

##user
Auth::routes();
Route::get('/home', 'UserController@index')->name('home');

##controllers


Route::resource('/',  'AccueilController');
