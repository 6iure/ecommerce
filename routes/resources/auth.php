<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest']], function() {

	Route::get('/login', [AuthController::class, 'showLoginForm'])
		->name('login');

	Route::post('/login', [AuthController::class, 'login'])
		->name('login.submit');

	Route::get('/register', [AuthController::class, 'showRegisterForm'])
		->name('register');

	Route::post('/register', [AuthController::class, 'register'])
		->name('register.submit');  

});

Route::group(['middleware' => ['auth']], function() {

	Route::get('/logout', [AuthController::class, 'logout'])
		->name('logout');

});

