<?php

namespace Domain\Dashboard\Actions\NotificationTemplates\Strategies;

use App\Models\NotificationTemplate;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Notification as FacadesNotification;

final class SendNotificationToSpecificUser implements SendNotification
{
    private Collection $users;

    public function __construct(array $users)
    {
        $this->users = User::query()->active()->whereIn('id', $users)->get();
    }

    public function send(NotificationTemplate $notificationTemplate): void
    {
        FacadesNotification::send($this->users, new SendNotification($notificationTemplate));
    }
}
