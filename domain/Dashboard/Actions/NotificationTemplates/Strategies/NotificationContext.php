<?php

namespace Domain\Dashboard\Actions\NotificationTemplates\Strategies;

use App\Exceptions\LogicException;
use App\Models\NotificationTemplate;
use Domain\Dashboard\Actions\NotificationTemplates\SendNotificationToAllDeliveryWorkers;
use Domain\Dashboard\Actions\NotificationTemplates\SendNotificationToAllUsers;
use Domain\Dashboard\DataTransferToObject\NotificationTemplates\SendNotificationTemplateData;
use Domain\Dashboard\Enums\NotificationTemplateTypeEnum;

class NotificationContext
{
    public function send(SendNotificationTemplateData $data, NotificationTemplate $notificationTemplate): void
    {
        match ($data->type) {
            NotificationTemplateTypeEnum::All_USER => (new SendNotificationToAllUsers)->send($notificationTemplate),
            NotificationTemplateTypeEnum::SPECIFIC_USER => (new SendNotificationToSpecificUser($data->notify_ides))->send($notificationTemplate),
            NotificationTemplateTypeEnum::All_DELIVERY_WORKER => (new SendNotificationToAllDeliveryWorkers)->send($notificationTemplate),
            NotificationTemplateTypeEnum::SPECIFIC_DELIVERY_WORKER => (new SendNotificationToSpecificDeliveryWorker($data->notify_ides))->send($notificationTemplate),
            NotificationTemplateTypeEnum::ALl_SHOP => (new SendNotificationToAllShops)->send($notificationTemplate),
            NotificationTemplateTypeEnum::SPECIFIC_SHOP => (new SendNotificationToSpecificShop($data->notify_ides))->send($notificationTemplate),
            default => throw new LogicException('Invalid notification type')
        };
    }
}
