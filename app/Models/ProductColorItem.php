<?php

namespace App\Models;

class ProductColorItem extends BaseModel
{

    protected $fillable = [
        'color_id',
        'quantity',
        'price'
    ];
    protected $casts = [];
}
