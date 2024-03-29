<?php

namespace App\Providers;

use App\Models\Coupon;
use App\Models\Product;
use App\Models\Shop;
use App\Observers\CouponObserver;
use App\Observers\ProductObserver;
use App\Observers\ShopObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    protected $observers = [
        Shop::class => ShopObserver::class,
     //   Product::class => ProductObserver::class,
        Coupon::class => CouponObserver::class
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
