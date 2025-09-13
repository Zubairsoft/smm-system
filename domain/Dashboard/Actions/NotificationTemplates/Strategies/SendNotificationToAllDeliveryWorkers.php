<?php

namespace Domain\Dashboard\Actions\NotificationTemplates;

use App\Models\DeliveryWorker;
use App\Models\NotificationTemplate;
use Domain\Dashboard\Actions\NotificationTemplates\Strategies\SendNotification;
use Domain\Dashboard\Notifications\SendCustomNotification;
use Illuminate\Support\Facades\Notification;

final class SendNotificationToAllDeliveryWorkers implements SendNotification
{

    public function send(NotificationTemplate $notificationTemplate): void
    {
        DeliveryWorker::active()->chunk(1000, function ($users) use ($notificationTemplate) {
            Notification::send($users, new SendCustomNotification($notificationTemplate));
        });
    }
}
