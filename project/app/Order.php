<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
      'customer_name', 'people_count', 'date', 'total_price', 'table_number', 'user_id', 'checkin', 'checkout'
    ];
}
