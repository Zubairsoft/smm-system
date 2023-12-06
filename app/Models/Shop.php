<?php

namespace App\Models;

use Domain\Dashboard\Attributes\ShopAttributes;
use Domain\Supports\Concerns\Verifies\HasActivateAccount;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Shop extends BaseModel implements HasMedia
{
    use SoftDeletes,
        HasApiTokens,
        InteractsWithMedia,
        HasActivateAccount,
        ShopAttributes;

    protected $fillable = [
        'name',
        'owner_name',
        'phone',
        'email',
        'password',
        'description',
        'address',
        'is_active'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];


    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('avatar')
            ->singleFile();
    }

    public function verifyEmail(): MorphOne
    {
        return $this->morphOne(VerifyEmail::class, 'verifiable');
    }

    public function bankAccounts(): MorphMany
    {
        return $this->morphMany(BankAccount::class, 'owner');
    }
}
