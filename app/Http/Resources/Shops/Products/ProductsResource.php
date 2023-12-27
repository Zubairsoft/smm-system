<?php

namespace App\Http\Resources\Shops\Products;

use App\Http\Resources\Supports\Lists\MediaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
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
            'colors' => $this->colors,
            'quantity' => $this->quantity,
            'total_price' => $this->total_price,
            'image' => $this->image,
        ];
    }
}
