<?php

namespace Domain\Shops\DataTransferToObject\Products;

use Domain\Shops\DataTransferToObject\ProductItems\StoreProductItemData;
use Domain\Shops\DataTransferToObject\ProductColorItems\StoreProductColorItemData;
use Domain\Shops\Enums\DiscountTypeEnum;
use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StoreProductData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        #[DataCollectionOf(StoreProductColorItemData::class)]
        public array $product_color_items,
        #[DataCollectionOf(StoreProductItemData::class)]
        public array $product_items,
        public string $name,
        public string $description,
        public Optional|float $quantity,
        public float $price,
        public Optional|array $tag_ids,
        public string $category_id,
        public string $brand_id,
        public Optional|bool $can_refund_money,
        public Optional|bool $can_show_quantity,
        public Optional|bool $is_active,
        public int $minimum_quantity,
        public Optional|UploadedFile $image,
        public Optional|array $product_images,
        public Optional|float $discount = 0,
        public string $discount_type,
        public Optional|int $discount_percentage,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:64',
            ],
            'description' => [
                'required',
                'string',
            ],
            'price' => [
                'required',
                'numeric',
                'min:0'
            ],
            'minimum_quantity' => [
                'required',
                'integer',
            ],
            'tag_ids' => [
                'array'
            ],
            'tag_ids.*' => [
                Rule::exists('tags', 'id'),
            ],
            'category_id' => [
                'required',
                Rule::exists('categories', 'id'),
            ],
            'brand_id' => [
                'required',
                Rule::exists('brands', 'id'),
            ],
            'can_refund_money' => [
                'boolean'
            ],
            'can_show_quantity' => [
                'boolean'
            ],
            'is_active' => [
                'boolean'
            ],
            'image' => [
                'required',
                File::types(['png', 'jpeg', 'jpg'])->max(2 * 1024),
            ],
            'product_images' => [
                'required',
                'array',
            ],
            'product_images.*' => [
                'required',
                File::types(['png', 'jpeg', 'jpg'])->max(2 * 1024),
            ],
            'discount_type' => [
                'required',
                Rule::in(DiscountTypeEnum::getValues())
            ],
            'discount_percentage' => [
                'integer',
                'min:0',
                'max:100',
                Rule::requiredIf(request()->discount_type === DiscountTypeEnum::PERCENTAGE),
                Rule::prohibitedIf(request()->discount_type !== DiscountTypeEnum::PERCENTAGE),
            ],
            'discount' => [
                'numeric',
                'min:0',
                Rule::requiredIf(request()->discount_type === DiscountTypeEnum::PRICE),
                Rule::prohibitedIf(request()->discount_type !== DiscountTypeEnum::PRICE),
            ],
            'product_color_items' => [
                'required',
                'array'
            ],
            'product_color_items.*.*.color_id' => [
                'required',
            ],
            'product_color_items.*.*.quantity' => [
                'numeric',
                'min:1'
            ],
            'product_color_items.*.*.price' => [
                'numeric',
                'min:0'
            ],
            'product_items' => [
                'required',
                'array'
            ],
            'product_items.*.product_attribute_detail_id' => [
                'required',
            ],
            'product_items.*.quantity' => [
                'numeric',
                'min:1'
            ],
            'product_items.*.price' => [
                'numeric',
                'min:0'
            ],
        ];
    }

    private function calculateQuantity()
    {
        $quantity = 0;

        foreach ($this->product_items as $item) {
            $quantity += $item->quantity;
        }

        return $quantity;
    }

    public function getQuantityAttribute(): array
    {
        return ['quantity' => $this->calculateQuantity()];
    }
}
