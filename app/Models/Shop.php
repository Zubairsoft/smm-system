<?php

namespace App\Models;

use App\Exceptions\LogicException;
use Domain\Dashboard\Attributes\ShopAttributes;
use Domain\Supports\Concerns\Transactions\HasTransaction;
use Domain\Supports\Concerns\Verifies\HasActivateAccount;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        HasTransaction,
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

    public function checkProducts(array $products_ids): void
    {
        $products = $this->products()->whereIn('id', $products_ids)->pluck('id')->toArray();

        if (count($products) !== count($products_ids)) {
            throw new LogicException(__('exceptions.record_not_found'), 404);
        }
    }

    public function verifyEmail(): MorphOne
    {
        return $this->morphOne(VerifyEmail::class, 'verifiable');
    }

    public function verifyPhone(): MorphOne
    {
        return $this->morphOne(VerifyPhone::class, 'verifiable');
    }

    public function bankAccounts(): MorphMany
    {
        return $this->morphMany(BankAccount::class, 'owner');
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function coupons(): HasMany
    {
        return $this->hasMany(Coupon::class);
    }

    public function supportTickets(): HasMany
    {
        return $this->hasMany(SupportTicket::class);
    }
}
