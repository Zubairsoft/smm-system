<?php

namespace Domain\Dashboard\Actions\NotificationTemplates;

use App\Models\NotificationTemplate;
use Domain\Dashboard\Actions\NotificationTemplates\Strategies\NotificationContext;
use Domain\Dashboard\DataTransferToObject\NotificationTemplates\SendNotificationTemplateData;

final class SendNotificationTemplateAction
{
    public function __invoke(SendNotificationTemplateData $data, NotificationTemplate $notificationTemplate): void
    {
        (new NotificationContext)->send($data, $notificationTemplate);
    }
}
