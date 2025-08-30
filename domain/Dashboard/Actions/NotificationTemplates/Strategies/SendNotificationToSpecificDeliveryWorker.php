<?php

namespace Domain\Dashboard\Actions\NotificationTemplates\Strategies;

use App\Models\DeliveryWorker;
use App\Models\NotificationTemplate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Notification as FacadesNotification;
use Domain\Dashboard\Actions\NotificationTemplates\Strategies\SendNotification;
use Domain\Dashboard\Notifications\SendCustomNotification;

final class SendNotificationToSpecificDeliveryWorker implements SendNotification
{
    private Collection $delivery_worker;

    public function __construct(array $delivery_worker)
    {
        $this->delivery_worker = DeliveryWorker::query()->active()->whereIn('id', $delivery_worker)->get();
    }

    public function send(NotificationTemplate $notificationTemplate): void
    {
        FacadesNotification::send($this->delivery_worker, new SendCustomNotification($notificationTemplate));
    }
}
