<?php

namespace App\Http\Resources\Dashboard\Shops;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AccountOwnerResource extends JsonResource
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
            'name' => $this->name,
            'owner_name' => $this->owner_name,
        ];
    }
}
