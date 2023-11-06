<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    use HasFactory;


    protected $fillable = [
        'date',
        'maethod',
        'customerId',
        'orderId',
        'paymentTotal',
    ];

    public function order()
    {
        return $this->belongsTo(orders::class);
    }
    public function user()
    {
        return $this->belongsTo(user::class);
    }
}



