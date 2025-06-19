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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::namespace('App\Http\Controllers')->middleware(['auth'])->group(function() {
    Route::resource('pharmacies', 'PharmaciesController');
    Route::resource('products', 'ProductsController');
    Route::resource('products', 'ProfilesController');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('/query', [App\Http\Controllers\QueriesController::class, 'show'])->name('query');
});

