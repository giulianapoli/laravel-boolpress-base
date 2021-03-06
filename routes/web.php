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

Route::resource('/', 'CategoryController');

Route::resource('/post', 'PostController');

// Route::resource('/postinformation/{id}', 'PostInformationController');

Route::resource('/tag', 'TagController');
