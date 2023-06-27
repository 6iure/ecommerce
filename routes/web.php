<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
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

require __DIR__.'/resources/auth.php';

Route::group(['middleware' => ['auth']], function() {

    require __DIR__.'/resources/home.php';

    require __DIR__.'/resources/categories.php';

    Route::get('dashboard', [HomeController::class, 'index']);

    Route::get('logout', [LoginController::class, 'register']);


    //Route::get('categories', [CategoryController::class, 'index'] );


    //  Route::get('/index', function () {
    //     return view('index');
    // });

    // Route::get('/users', function () {
    //     return view('users');
    // });

    // Route::get('/categories', function () {
    //     return view('categories');
    // });

    // Route::get('/products', function() {
    //     return view('products');
    // });

    // Route::get('images', function() {
    //     return view('images');
    // });

    // Route::get('operations', function () {
    //     return view('operations');
    // });

    // Route::get('transactions', function() {
    //     return view('transactions');
    // });

    // Route::get('tproducts', function() {
    //     return view('tproducts');
    // });

    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->middleware(['auth'])->name('dashboard');

});
