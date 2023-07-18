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

    //todo colocar o uploadImages dentro do index e form de produtos, salvar no db tb, por enquanto mudei form e filters, index e form do products.
    require __DIR__.'/resources/products.php';

    require __DIR__.'/resources/productImages.php';

    require __DIR__.'/resources/transactions.php';

    //todo melhorar nome da rota -> usar transaction-products : ok
    require __DIR__.'/resources/transaction-products.php';

    Route::get('upload/image', [ProductImageController::class, 'ImageUpload'])->name('ImageUpload');

    Route::post('upload/image',[ProductImageController::class, 'ImageUploadStore'])->name('ImageUploadStore');
});
