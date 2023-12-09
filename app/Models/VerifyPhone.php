<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;

class VerifyPhone extends BaseModel
{
    protected $fillable = [
        'phone',
        'otp',
    ];

    public function verifiable(): MorphTo
    {
        return $this->morphTo();
    }
}
