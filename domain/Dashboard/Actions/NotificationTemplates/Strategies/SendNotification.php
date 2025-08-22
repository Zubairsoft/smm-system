<?php

namespace Domain\Dashboard\Actions\NotificationTemplates\Strategies;

use App\Models\NotificationTemplate;

interface SendNotification
{
    public  function send(NotificationTemplate $notificationTemplate): void;
}
