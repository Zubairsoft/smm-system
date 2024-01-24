<?php

namespace App\Http\Resources\Dashboard\PromotionalOffers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PromotionalOfferResource extends JsonResource
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
            'text' => $this->text,
            'promotional_duration' => $this->duration,
            'expire_at' => $this->expire_at,
            'products' => ProductResource::collection($this->whenLoaded('products'))
        ];
    }
}
