<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class finance extends Model
{
    protected $fillable = [
        'amount','description','date','type'
    ];
}
