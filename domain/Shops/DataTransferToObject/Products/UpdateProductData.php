<?php

namespace Domain\Shops\DataTransferToObject\Products;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateProductData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public Optional|string $name,
        public Optional|string $description,
        public Optional|string $colors,
        public Optional|float $quantity,
        public Optional|int $minimum_quantity,
        public Optional|float $additional_price_for_size,
        public Optional|float $additional_price_for_color,
        public Optional|float $discount,
        public Optional|float $price,
        public Optional|float $total_price,
        public Optional|array $tags,
        public Optional|string $category_id,
        public Optional|string $brand_id,
        public Optional|string $product_attribute_detail_id,
        public Optional|bool $can_refund_money,
        public Optional|bool $can_show_quantity,
        public Optional|bool $is_active,
        public Optional|UploadedFile $image,
        public Optional|array $product_images,
    ) {
    }

    public static function rules(): array
    {
        return [
            'name' => [
                'string',
                'max:64',
            ],
            'description' => [
                'string',
            ],
            'colors' => [
                'string',
                'max:255,'
            ],
            'quantity' => [
                'numeric',
            ],
            'minimum_quantity' => [
                'integer',
            ],
            'additional_price_for_size' => [
                'numeric',
                'min:0',
            ],
            'additional_price_for_color' => [
                'numeric',
                'min:0',
            ],
            'discount' => [
                'numeric',
                'min:0',
                'max:100',
            ],
            'tags' => [
                'array'
            ],
            'tags.*' => [
                Rule::exists('tags', 'id'),
            ],
            'category_id' => [
                Rule::exists('categories', 'id'),
            ],
            'brand_id' => [
                Rule::exists('brands', 'id'),
            ],
            'product_attribute_detail_id' => [
                Rule::exists('product_attribute_details', 'id'),
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
                File::types(['png', 'jpeg', 'jpg'])->max(2 * 1024),
            ],
            'product_images' => [
                'array',
            ],
            'product_images.*' => [
                File::types(['png', 'jpeg', 'jpg'])->max(2 * 1024),
            ],
        ];
    }
}
