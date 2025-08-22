<?php

namespace Domain\Dashboard\DataTransferToObject\NotificationTemplates;

use Domain\Dashboard\Enums\NotificationTemplateTypeEnum;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

final class SendNotificationTemplateData extends Data
{
    public function __construct(
        public Optional|array $notify_ides,
        public string $type,
    ) {}

    public function rules(): array
    {
        return [
            'notify_ides' => [
                'array',
                Rule::requiredIf(fn() => $this->type == NotificationTemplateTypeEnum::SPECIFIC_USER || $this->type == NotificationTemplateTypeEnum::SPECIFIC_DELIVERY_WORKER || $this->type == NotificationTemplateTypeEnum::SPECIFIC_SHOP),
            ],
            'type' => [
                'required',
                'string',
                Rule::in(NotificationTemplateTypeEnum::getValues())
            ],
        ];
    }
}
