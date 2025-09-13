<?php

namespace Domain\Dashboard\Actions\NotificationTemplates;

use App\Models\NotificationTemplate;
use App\Models\User;
use Domain\Dashboard\Actions\NotificationTemplates\Strategies\SendNotification;
use Domain\Dashboard\Notifications\SendCustomNotification;
use Illuminate\Support\Facades\Notification;

final class SendNotificationToAllUsers implements SendNotification
{

    public function send(NotificationTemplate $notificationTemplate): void
    {
        User::active()->chunk(1000, function ($users) use ($notificationTemplate) {
            Notification::send($users, new SendCustomNotification($notificationTemplate));
        });
    }
}
