<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'orderDate',
        'totalPrice',
        'phone',
        'customerId',
        'shipmentId',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the RentalItem model
    // public function orderItems()
    // {
    //     return $this->hasMany(orderItems::class);
    // }
    public function orderItems()
    {
        return $this->hasMany(OrderItems::class, 'orderId'); 
    }

    public function shipment()
    {
        return $this->hasOne(Shipment::class);
    }
    public function payment()
    {
        return $this->hasOne(payments::class);
    }
    
}
