<?php

namespace Domain\Dashboard\DataTransferToObject\PromotionalOffers;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdatePromotionalOfferData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public Optional|string $text,
        #[MapInputName('promotional_duration')]
        public Optional|int $duration,
        public array $product_ids,
        public Optional|Carbon $expire_at,
    ) {

        $this->setExpireAt();
    }

    public static function rules(): array
    {
        return [
            'text' => [
                'string',
                'min:10',
            ],
            'promotional_duration' => [
                'numeric',
                'min:1',
                'max:360',
            ],
            'product_ids' => [
                'require',
                'array',
            ],
            'product_ids.*' => [
                'require',
                Rule::exists('products', 'id'),
            ],
        ];
    }

    private function setExpireAt()
    {
        if (isset($this->duration)) {
            $this->expire_at = Carbon::now()->addDays($this->duration);
        }
    }
}
