<?php

use App\Http\Controllers\StockOperationController;
use Illuminate\Support\Facades\Route;

Route::resource('stock-operations', StockOperationController::class);
