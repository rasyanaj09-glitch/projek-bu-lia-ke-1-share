<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{
    protected $fillable = [
    'user_id',
    'order_number',
    'total_amount',
    'status',
    'shipping_address',
    'shipping_phone',
    'payment_method',
    'payment_status'
];

}
