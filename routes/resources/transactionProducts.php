<?php

use App\Http\Controllers\TransactionProductController;
use Illuminate\Support\Facades\Route;

Route::resource('transactionProducts', TransactionProductController::class)
    ->except(['show']);
