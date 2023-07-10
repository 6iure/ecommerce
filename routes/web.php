<?php

use App\Http\Controllers\ProductImageController;
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

    require __DIR__.'/resources/products.php';

    require __DIR__.'/resources/productimages.php';

    require __DIR__.'/resources/transactions.php';


    Route::get('upload/image', [ProductImageController::class, 'ImageUpload'])->name('ImageUpload');

    Route::post('upload/image',[ProductImageController::class, 'ImageUploadStore'])->name('ImageUploadStore');

});

Route::group([], function() {

//Visualizar formulario para editar as categorias
Route::get('category/{id}/editar', ['uses' => 'App\Http\Controllers\CategoryController@edit', 'role' => 'category.update']);

//Atualizar uma categoria
Route::put('category', ['uses' => 'App\Http\Controllers\CategoryController@update', 'role' => 'category.update']);

//Remover uma categoria
Route::delete('category', ['uses' => 'App\Http\Controllers\CategoryController@delete', 'role' => 'category.delete']);

});

Route::group([], function() {

   //Visualizar form para editar os produtos
   Route::get('product/{id}/editar', ['uses' => 'App\Http\Controllers\ProductController@edit', 'role' => 'product.update']) ;

   //Atualizar produto
   Route::put('product', ['uses' => 'App\Http\Controllers\ProductController@edit', 'role' => 'product.update']);

   //REmover uma produto
   Route::delete('product', ['uses' => 'App\Http\Controllers\ProductController@delete', 'role' => 'product.delete']);

});

// Route::group([], function(){

//     Route::store('')

// });
