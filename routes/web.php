<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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


Auth::routes();

Route::get('/', function () {
    return view('welcome');
})->name('welcome');
Route::get('/pharmacy', 'App\Http\Controllers\HomeController@pharmacy')->name('home.pharmacy');

Route::namespace('App\Http\Controllers')->middleware(['auth'])->group(function() {
    Route::resource('pharmacies', 'PharmaciesController');
    Route::resource('products', 'ProductsController');
    Route::resource('products', 'ProfilesController');
    Route::get('/home', 'HomeController@home')->name('home.user');
    Route::post('/query', [App\Http\Controllers\QueriesController::class, 'show'])->name('query');
});