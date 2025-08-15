<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class sale extends Model

{
  use HasFactory;

    protected $fillable = [
        'product_name',
        'price',
        'quantity',
        'total_price',
        'customer_name',
        'contact',
        'address',
       
    ];
}  

