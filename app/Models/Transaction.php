<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Transaction extends Model
{
    use HasFactory;

    public function products() {
        return $this->belongsToMany(Product::class);
    }

    public function scopeSearch($query, Request $request) {

        if ($request->name) {
            $query->where('name', $request->name);
        }

    }
}
