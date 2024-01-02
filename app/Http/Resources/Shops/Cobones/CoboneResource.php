<?php

namespace App\Http\Resources\Shops\Cobones;

use Domain\Shops\Enums\CoboneTypeEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CoboneResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $resource = [
            'id' => $this->id,
            'token' => $this->token,
            'cobone_type' => $this->cobone_type,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
        ];

        if ($this->type->is(CoboneTypeEnum::TOTAL_ORDER)) {
            $resource += ['total_order' => $this->total_order];
        }
        return $resource;
    }
}
