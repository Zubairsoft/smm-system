<?php

namespace App\Http\Resources\Shops\BanKAccounts;

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
            'bank' => $this->bank->name,
            'account_number' => $this->account_number,
            'currency' => $this->currency
        ];
    }
}
