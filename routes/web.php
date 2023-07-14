<?php

use App\Http\Controllers\ProductImageController;
use App\Http\Controllers\StockOperationController;
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

    require __DIR__.'/resources/categories.php';

    require __DIR__.'/resources/products.php';

    require __DIR__.'/resources/productImages.php';

    require __DIR__.'/resources/transactions.php';

    require __DIR__.'/resources/transactionProducts.php';

    Route::get('upload/image', [ProductImageController::class, 'ImageUpload'])->name('ImageUpload');

    Route::post('upload/image',[ProductImageController::class, 'ImageUploadStore'])->name('ImageUploadStore');

    // //Rotas para Operações de Estoque
    // Route::get('stock-operation/index', [StockOperationController::class, 'stockOperation'])->name('stock-operation.index');

    // Route::get('stock-operation/create', [StockOperationController::class, 'stockOperation'])->name('stock-operation.create');

    // Route::post('stock-operation', [StockOperationController::class, 'stockOperation'])->name('stock-operation.store');

});
