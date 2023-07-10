<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Category extends Model
{
    use HasFactory;

    public function products() {
        return $this->hasMany(Product::class);
    }

    protected $table = 'categories';

    protected $fillable = [
        'id',
        'name',
    ];

    public function scopeSearch($query, Request $request) {

        // TODO fazer filtros, joins, selects, etc...

        if ($request->name) {
            $query->where('name', $request->name);
        }
    }
}
