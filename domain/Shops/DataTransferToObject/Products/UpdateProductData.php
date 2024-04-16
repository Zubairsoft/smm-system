<?php

namespace Domain\Shops\DataTransferToObject\Products;

use Domain\Shops\Enums\DiscountTypeEnum;
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
        public Optional|float $quantity,
        public Optional|int $minimum_quantity,
        public Optional|float $discount,
        public Optional|float $price,
        public Optional|array $tags,
        public Optional|string $category_id,
        public Optional|string $brand_id,
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
            'quantity' => [
                'numeric',
            ],
            'minimum_quantity' => [
                'integer',
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
