<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderMenu extends Model
{
    protected $fillable = [
        'order_id','menu_id','qty'
    ];
}
