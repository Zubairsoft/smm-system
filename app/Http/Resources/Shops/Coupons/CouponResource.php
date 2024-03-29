<?php

namespace App\Http\Resources\Shops\Coupons;

use Domain\Shops\Enums\CouponTypeEnum;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
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
            'code' => $this->code,
            'coupon_type' => $this->coupon_type,
            'start_at' => $this->start_at,
            'end_at' => $this->end_at,
        ];

        if ($this->type->is(CouponTypeEnum::TOTAL_ORDER)) {
            $resource += ['total_order' => $this->total_order];
        }
        return $resource;
    }
}
