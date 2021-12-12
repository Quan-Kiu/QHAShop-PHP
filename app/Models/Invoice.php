<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'user_id',
        'shipping_address',
        'shipping_phone',
        'total',
        'delivery_date',
        'invoice_status_id',
    ];
}
