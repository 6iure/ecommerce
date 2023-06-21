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

Route::get('/index', function () {
    return view('index');
});

Route::get('/users', function () {
    return view('users');
});

Route::get('/categories', function () {
    return view('categories');
});

Route::get('/products', function() {
    return view('products');
});

Route::get('images', function() {
    return view('images');
});

Route::get('operations', function () {
    return view('operations');
});

Route::get('transactions', function() {
    return view('transactions');
});

Route::get('tproducts', function() {
    return view('tproducts');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php' ;
