<?php

use App\Http\Controllers\CategoryController;
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
    return redirect('/products');
});

Route::resource('/categories', CategoryController::class);
Route::post('/categories/delete/{id}', [CategoryController::class, 'destroy']);

Route::resource('/products', ProductController::class);
Route::post('/products/delete/{id}', [ProductController::class, 'destroy']);
