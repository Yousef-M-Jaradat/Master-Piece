<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coupons extends Model
{
    use HasFactory;

    public function carts()
    {
        return $this->hasMany(carts::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
