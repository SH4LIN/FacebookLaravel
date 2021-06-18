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
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/home','App\Http\Controllers\HomeController@coverEdit')->name('coverEdit');

Route::post('/home/profile','App\Http\Controllers\HomeController@profileEdit')->name('profileEdit');

Route::post('/home/bio','App\Http\Controllers\HomeController@bioEdit')->name('bioEdit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
