<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphTo;

class VerifyEmail extends BaseModel
{

    protected $fillable = [
        'email',
        'otp',
    ];

    public function verifiable(): MorphTo
    {
        return $this->morphTo();
    }
}
