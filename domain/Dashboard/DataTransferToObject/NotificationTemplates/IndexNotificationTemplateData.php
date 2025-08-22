<?php

namespace Domain\Dashboard\DataTransferToObject\NotificationTemplates;

use Domain\Dashboard\Enums\NotificationTemplateTypeEnum;
use Illuminate\Validation\Rule;
use Spatie\LaravelData\Data;

final class IndexNotificationTemplateData extends Data
{
    public function __construct(
        public string $search_text,
        public string $type,
    ) {}

    public function rules(): array
    {
        return [
            'search_text' => [
                'string',
                'nullable',
            ],
            'type' => [
                'string',
                'nullable',
                Rule::in(NotificationTemplateTypeEnum::getValues())
            ],
        ];
    }
}
