<?php

namespace Domain\Dashboard\Actions\NotificationTemplates\Strategies;

use App\Models\NotificationTemplate;
use App\Models\Shop;
use Domain\Dashboard\Actions\NotificationTemplates\Strategies\SendNotification;
use Domain\Dashboard\Notifications\SendCustomNotification;
use Illuminate\Support\Facades\Notification;

final class SendNotificationToAllShops implements SendNotification
{
    public function send(NotificationTemplate $notificationTemplate): void
    {
        Shop::active()->chunk(100, function ($shops) use ($notificationTemplate) {
            Notification::send($shops, new SendCustomNotification($notificationTemplate));
        });
    }
}