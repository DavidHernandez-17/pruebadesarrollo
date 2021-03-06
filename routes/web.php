<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', 
    [DashboardController::class, 'index']
);


Route::resource('/products', ProductController::class);
Route::get('/products/{id}/confirmDelete', 'App\Http\Controllers\ProductController@confirmDelete');
Route::put('/products/{id}/temporalsale', 'App\Http\Controllers\ProductController@temporalsale');
Route::put('/products/{id}/temporalsale/down', 'App\Http\Controllers\ProductController@temporalsaledown');
Route::put('/products/{id}/temporal/plus', [ProductController::class, 'temporalplus']);
Route::put('/products/{id}/temporal/minus', [ProductController::class, 'temporalminus']);
Route::post('/products/buy/confirm', [ProductController::class, 'buyconfirm'])->name('buyconfirm');
Route::get('/products/shopping/car', [ProductController::class,'shopping'])->name('shopping');


Route::get('/stores', [StoreController::class, 'index']);


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


