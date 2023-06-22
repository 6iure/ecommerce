<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Mostrar que a class de "produtos" pertence a class de categorias.
     *
     * @return void
     */
    public function category() {
        return $this->belongsTo(Category::class);
    }

    /**
     * Mostrar que a classe Produto tem muitas imagens de produtos
     *
     * @return void
     */
    public function images() {
        return $this->hasMany(ProductImage::class);
    }

    /**
     * Mostrar que a classe Produto tem muitas operações de estoque
     *
     * @return void
     */
    public function stockOperations() {
        return $this->hasMany(StockOperation::class);
    }

    /**
     * Mostrar que um produto pode ter várias transações
     *
     * @return void
     */
    public function transactions() {
        return $this->belongsToMany(Transaction::class);
    }
}
