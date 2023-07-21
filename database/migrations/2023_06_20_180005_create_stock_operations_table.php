<?php

use App\Enums\StockOperationEnum;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock-operations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->nullable();
            $table->enum('operation_id', StockOperationEnum::getValues());
            $table->integer('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock-operations');
    }
}
