<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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


// Membuat routing

Route::get('/products', 'ProductController@get');

// untuk id yang ingin dipanggil
Route::get('/product/{id}', 'ProductController@getById');

Route::post('/product', 'ProductController@post');

Route::put('/product/{id}', 'ProductController@put');

Route::delete('/product/{id}', 'ProductController@delete');


