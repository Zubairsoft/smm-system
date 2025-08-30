<?php

namespace Domain\Dashboard\Actions\NotificationTemplates\Strategies;

use App\Models\NotificationTemplate;
use App\Models\Shop;
use Domain\Dashboard\Notifications\SendCustomNotification;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Notification as FacadesNotification;

final class SendNotificationToSpecificShop implements SendNotification
{
    private Collection $shops;

    public function __construct(array $shops)
    {
        $this->shops = Shop::query()->active()->whereIn('id', $shops)->get();
    }

    public  function send(NotificationTemplate $notificationTemplate): void
    {
        FacadesNotification::send($this->shops, new SendCustomNotification($notificationTemplate));
    }
}
