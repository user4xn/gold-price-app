<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaction_date',
        'buyer_name',
        'buyer_phone',
        'buyer_email',
        'buyer_address',
        'gold_json',
        'gold_price',
        'product_id',
        'qty',
        'grand_total',
    ];
}

