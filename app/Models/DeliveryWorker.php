<?php

namespace App\Models;

class DeliveryWorker extends BaseModel
{

    protected $fillable = [
        'name',
        'identifier',
        'password'
    ];

    protected $hidden= [
        'password',
    ];

    protected $casts = [
        'is_active'=>'boolean'
    ];
}
