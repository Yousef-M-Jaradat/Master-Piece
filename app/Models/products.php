<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'productName',
        'Sdescription',
        'Ldescription',
        'price',
        'categoryId',
        'image1',
        'image2',
        'image3',
        'stockqty',
    ];

    public function category()
    {
        return $this->belongsTo(categories::class);
    }


    public function reviews()
    {
        return $this->hasMany(reviews::class);
    }

    public function carts()
    {
        return $this->hasMany(carts::class);
    }

    public function orderItems()
    {
        return $this->hasMany(orderItems::class);
    }
}
