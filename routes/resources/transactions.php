<?php

use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::resource('transactions', TransactionController::class);
