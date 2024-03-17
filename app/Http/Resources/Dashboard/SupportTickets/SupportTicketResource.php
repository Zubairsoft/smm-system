<?php

namespace App\Http\Resources\Dashboard\SupportTickets;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportTicketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'shop' => $this->shop->name,
            'title' => $this->title,
            'subject' => $this->subject,
            'reply' => $this->reply,
            'attachment' => $this->attachment,
            'status' => $this->status->description
        ];
    }
}
