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

Route::get('/', 'GalleryController@index');

Route::resource('gallery', 'GalleryController');

Route::resource('pic', 'PicController');

Route::get('/gallery/show/{id}', 'GalleryController@show');

Route::get('/pic/create/{id}', 'PicController@create');

Route::get('/pic/details/{id}', 'PicController@details');

//Authentication - Login && Register
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
