<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ewallet extends Model
{
    protected $casts = [
        'item_name' => 'array',
        'item_image_url' => 'array',
        'item_price' => 'array'
    ];
}
