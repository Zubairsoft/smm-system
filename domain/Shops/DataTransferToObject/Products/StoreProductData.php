<?php

namespace Domain\Shops\DataTransferToObject\Products;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Http\UploadedFile;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\File;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StoreProductData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $name,
        public string $description,
        #[MapInputName('product_colors')]
        public string $colors,
        public float $quantity,
        public float $price,
        public Optional|float $total_price,
        public Optional|array $tag_ids,
        public string $category_id,
        public string $brand_id,
        public string $product_attribute_detail_id,
        public Optional|bool $can_refund_money,
        public Optional|bool $can_show_quantity,
        public Optional|bool $is_active,
        public int $minimum_quantity,
        public UploadedFile $image,
        public array $product_images,
        public float $additional_price_for_size = 0,
        public float $additional_price_for_color = 0,
        public float $discount = 0,
    ) {
        $this->total_price=$this->getTotalPrice();
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
            'product_colors' => [
                'required',
                'string',
                'max:255,'
            ],
            'quantity' => [
                'required',
                'numeric',
            ],
            'minimum_quantity' => [
                'required',
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
            'product_attribute_detail_id' => [
                'required',
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
        ];
    }

    private function getTotalPrice(): float
    {
        return $this->getTotalPriceWithoutDiscount() - $this->getDiscount();
    }

    private function getDiscount(): int
    {
        return $this->getTotalPriceWithoutDiscount() * ($this->discount / 100);
    }

    private function getTotalPriceWithoutDiscount(): float
    {
        return ($this->price + $this->additional_price_for_color + $this->additional_price_for_size);
    }
}
