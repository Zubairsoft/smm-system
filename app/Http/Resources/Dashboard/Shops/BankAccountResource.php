<?php

namespace App\Http\Resources\Dashboard\Shops;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BankAccountResource extends JsonResource
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
            'owner' =>$this->owner->name,
            'account_number' => $this->account_number,
            'currency' => $this->currency->key,
        ];
    }
}
