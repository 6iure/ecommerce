<?php

use App\Http\Controllers\TransactionProductController;
use Illuminate\Support\Facades\Route;

Route::resource('transaction-products', TransactionProductController::class)
    ->except(['show']);
