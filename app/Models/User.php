<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable //TODO entender o que significa ..
{
    use HasFactory;

    public function group() {
        return $this->belongsTo(Group::class);
    }
}
