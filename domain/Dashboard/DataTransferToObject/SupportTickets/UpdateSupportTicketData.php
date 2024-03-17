<?php

namespace Domain\Dashboard\DataTransferToObject\SupportTickets;

use Domain\Supports\Concerns\Requests\HasFailedValidationDtoRequest;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class UpdateSupportTicketData extends Data
{
    use HasFailedValidationDtoRequest;

    public function __construct(
        public Optional|string $reply,
        public Optional|int $status,
    ) {
    }


}
