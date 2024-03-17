<?php

namespace App\Models;

use Domain\Shops\Attributes\SupportTicketAttributes;
use Domain\Shops\Enums\SupportTicketEnum;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class SupportTicket extends BaseModel implements HasMedia
{
    use InteractsWithMedia, SupportTicketAttributes;

    protected $fillable = [
        'title',
        'subject',
        'reply',
        'status'
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('attachment')
            ->singleFile();
    }

    protected $casts = [
        'status' => SupportTicketEnum::class
    ];

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }
}
