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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/thing/what', function () {
    return view('/thing/what');
});

Route::group(['prefix' => 'thing'],function(){//middleware
    Route::get('whats','Thing\WhatController@retrieve');
    Route::post('whats','Thing\WhatController@create');
    Route::put('whats','Thing\WhatController@update');
    Route::delete('whats','Thing\WhatController@del');
});
Route::any('/thing/upload', 'Thing\UploadController@upload');
