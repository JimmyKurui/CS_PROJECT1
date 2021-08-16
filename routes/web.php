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

Auth::routes();

Route::get('/pharmacy', [App\Http\Controllers\PharmaciesController::class, 'index'])->name('pharmacy-home');
Route::get('/pharmacy/create', [App\Http\Controllers\PharmaciesController::class, 'create']);
Route::get('/pharmacy/{pharmacy}', [App\Http\Controllers\PharmaciesController::class, 'show']);
Route::post('/pharmacy', [App\Http\Controllers\PharmaciesController::class, 'store']);
Route::get('/pharmacy/{pharmacy}/edit', [App\Http\Controllers\PharmaciesController::class, 'edit']);
Route::patch('/pharmacy/{pharmacy}', [App\Http\Controllers\PharmaciesController::class, 'update']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/product', [App\Http\Controllers\ProductsController::class, 'index']);
Route::get('/product/create', [App\Http\Controllers\ProductsController::class, 'create']);
Route::get('/product/{product}', [App\Http\Controllers\ProductsController::class, 'show']);
Route::post('/product', [App\Http\Controllers\ProductsController::class, 'store']);

Route::post('/query', [App\Http\Controllers\QueriesController::class, 'show']);

