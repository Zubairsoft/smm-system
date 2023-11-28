<?php

namespace App\Models;

use Domain\Dashboard\Attributes\ShopAttributes;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Shop extends BaseModel implements HasMedia
{
    use SoftDeletes, HasApiTokens, InteractsWithMedia, ShopAttributes;

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

    public function bankAccounts(): MorphMany
    {
        return $this->morphMany(BankAccount::class, 'owner');
    }
}
