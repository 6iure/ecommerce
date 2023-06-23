<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('categories', CategoryController::class)
	->except(['show']);

Route::group(['middleware' => ['guest']], function() {

    Route::get('/dashboard', [CategoryController::class, 'showDashboardForm'])
        ->name('dashboard');

});



