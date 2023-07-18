<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Product extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function images() {
        return $this->hasMany(ProductImage::class);
    }


    public function stockOperations() {
        return $this->hasMany(StockOperation::class);
    }

    public function transactions() {
        return $this->belongsToMany(Transaction::class);
    }

    protected $table = 'products';

    protected $fillable = [
        'id',
        'name',
        'description',
        'price',
        'current_stock',
        'image_path',
        'image_mimetype',
        'image_size'
    ];

    public function scopeSearch($query, Request $request) {

        //TODO fazer filtros, select, etc

        if ($request->name) {
            $query->where('name', $request->name);
        }
    }
}
