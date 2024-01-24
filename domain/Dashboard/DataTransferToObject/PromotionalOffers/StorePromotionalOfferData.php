<?php

namespace Domain\Dashboard\DataTransferToObject\PromotionalOffers;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class StorePromotionalOfferData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public string $text,
        public array $product_ids,
        public Optional|Carbon $expire_at,
        #[MapInputName('promotional_duration')]
        public int $duration,
    ) {
        $this->expire_at = Carbon::now()->addDays($this->duration);
    }

    public static function rules(): array
    {
        return [
            'text' => [
                'required',
                'string',
                'min:10',
            ],
            'promotional_duration' => [
                'required',
                'numeric',
                'min:1',
                'max:360',
            ],
            'product_ids' => [
                'required',
                'array',
            ],
            'product_ids.*' => [
                'required',
                Rule::exists('products', 'id'),
            ],
        ];
    }
}
