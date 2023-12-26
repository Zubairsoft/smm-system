<?php

namespace App\Http\Resources\Shops\Products;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'description' => $this->description,
            'colors' => $this->color,
            'quantity' => $this->quantity,
            'total_price' => $this->total_price,
            'image' => $this->product_images,
            'can_refund_money' => $this->can_refund_money,
            'can_show_quantity' => $this->can_show_quantity
        ];
    }
}
