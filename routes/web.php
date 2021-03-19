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

Route::get('/upload', 'ImageController@index')->name('image.index');
Route::post('/upload', 'ImageController@upload')->name('image.upload');
Route::get('/', 'ImageController@list')->name('image.list');
