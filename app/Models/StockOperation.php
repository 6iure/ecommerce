<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class StockOperation extends Model
{
    use HasFactory;

    public function products () {
        return $this->belongsTo(Product::class);
    }

    protected $table = 'stock-operations';

    protected $fillable = [
        'operation_id',
        'amount',
    ];

    public function scopeSearch($query, Request $request) {

        if($request->name) {
            $query->where('name', $request->name);
        }

    }
}


