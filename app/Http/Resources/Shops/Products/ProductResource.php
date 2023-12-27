<?php

namespace App\Http\Resources\Shops\Products;

use App\Http\Resources\Dashboard\Brands\BrandResource;
use App\Http\Resources\Supports\Lists\ListResource;
use App\Http\Resources\Supports\Lists\MediaResource;
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
            'product_attribute' => ListResource::make($this->productAttributeDetail->productAttribute),
            'product_attribute_detail' => ListResource::make($this->productAttributeDetail),
            'brand' => ListResource::make($this->brand),
            'category' => ListResource::make($this->category),
            'colors' => $this->colors,
            'quantity' => $this->quantity,
            'additional_price_for_size' => $this->additional_price_for_size,
            'additional_price_for_color' => $this->additional_price_for_size,
            'total_price' => $this->total_price,
            'image' => $this->image,
            'product_image' => $this->product_images->count() ? MediaResource::collection($this->product_images) : [],
            'minimum_quantity' => $this->minimum_quantity,
            'can_refund_money' => $this->can_refund_money,
            'can_show_quantity' => $this->can_show_quantity,
            'is_active' => $this->is_active,
        ];
    }
}
