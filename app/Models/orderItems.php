<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderItems extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'customerId',
        'productId',
        'orderId',
        'price',
        'quantity',
    ];

    public function order()
    {
        return $this->belongsTo(orders::class);
    }

    // Define the relationship with the Product model
    public function product()
    {
        return $this->belongsTo(products::class, 'productId');
    }


}
