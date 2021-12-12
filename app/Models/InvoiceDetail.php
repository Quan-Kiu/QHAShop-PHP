<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceDetail extends Model
{
    protected $fillable = [
        'product_id',
        'invoice_id',
        'quantity',
        'unit_price',
        'description',
    ];
}
