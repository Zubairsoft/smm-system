<?php

namespace Domain\Dashboard\Notifications;

use App\Models\NotificationTemplate;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;

class SendCustomNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(private NotificationTemplate $notificationTemplate)
    {
        $this->onQueue('notifications'); // TODO make notification queue in enum
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'title_ar' => $this->notificationTemplate->title_ar,
            'title_en' => $this->notificationTemplate->title_en,
            'content_ar' => $this->notificationTemplate->content_ar,
            'content_en' => $this->notificationTemplate->content_en
        ];
    }
}
