<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipments extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'customerId',
        'city',
        'phone',
        'country',
        'address',
        'shipmentDate',
    ];

    public function order()
    {
        return $this->belongsTo(orders::class);
    }
}
