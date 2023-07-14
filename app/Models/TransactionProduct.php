<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class TransactionProduct extends Model
{
    use HasFactory;

    protected $table = 'product_transaction';

    protected $fillable = [
        'amount',
        'price',
        'total'
    ];

    public function scopeSearch($query, Request $request) {

        if ($request->name) {
            $query->where('amount', $request->amount);
            $query->where('price', $request->price);
            $query->where('total', $request->total);
        }

    }

}
