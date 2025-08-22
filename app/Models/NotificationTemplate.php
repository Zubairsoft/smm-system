<?php

namespace App\Models;

use Domain\Dashboard\Enums\NotificationTemplateTypeEnum;
use Domain\Dashboard\Notifications\SendNotification;
use Illuminate\Support\Facades\Notification;

class NotificationTemplate extends BaseModel
{
    protected $fillable = [
        'type',
        'title_ar',
        'title_en',
        'content_ar',
        'content_en'
    ];

    protected $casts = [
        'type' => NotificationTemplateTypeEnum::class
    ];

}
