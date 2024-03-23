<?php

namespace Domain\Shops\DataTransferToObject\ProductInquires;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateProductInquireData extends Data
{
    public function __construct(
        public Optional|string $reply,
        public int $status
    ) {
    }
}
