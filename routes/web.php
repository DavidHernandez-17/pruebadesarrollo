<?php

use App\Http\Controllers\ProductController;
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


Route::resource('/products', ProductController::class);

Route::get('/products/{id}/confirmDelete', 'App\Http\Controllers\ProductController@confirmDelete');

Route::put('/products/{id}/temporalsale', 'App\Http\Controllers\ProductController@temporalsale');

Route::put('/products/{id}/temporalsale/down', 'App\Http\Controllers\ProductController@temporalsaledown');

Route::put('/products/{id}/temporal/plus', [ProductController::class, 'temporalplus']);
Route::put('/products/{id}/temporal/minus', [ProductController::class, 'temporalminus']);



Route::get('/products/{id}/buyconfirm', [ProductController::class, 'buyconfirm']);
Route::get('/products/shopping/car', [ProductController::class,'shopping'])->name('shopping');
