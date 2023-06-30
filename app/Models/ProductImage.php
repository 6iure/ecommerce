<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    public function products() {
        return $this->belongsTo(Product::class);
    }

    protected $table = 'product_images';

    protected $fillable = [
        'id',
        'size',
        'width',
        'height',
        'mimetype',
        'path'
    ];
}
