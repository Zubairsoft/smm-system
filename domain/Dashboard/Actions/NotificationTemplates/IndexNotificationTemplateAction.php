<?php

namespace Domain\Dashboard\Actions\NotificationTemplates;

use App\Models\NotificationTemplate;
use Domain\Dashboard\DataTransferToObject\NotificationTemplates\IndexNotificationTemplateData;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class IndexNotificationTemplateAction
{
    public function __invoke(IndexNotificationTemplateData $data): LengthAwarePaginator
    {
        return NotificationTemplate::query()
            ->when(
                request()->type,
                fn(Builder $query) => $query->where('type', $data->type)
            )
            ->when(
                request()->search_text,
                fn($query) => $query->whereAny(['name_ar', 'name_en', 'content_ar', 'content_en'], $data->search_text)
            )->paginate(request()->per_page ?? 10);
    }
}
