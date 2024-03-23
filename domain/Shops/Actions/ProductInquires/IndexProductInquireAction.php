<?php

namespace Domain\Shops\Actions\ProductInquires;

use App\Models\ProductInquire;
use Domain\Shops\DataTransferToObject\ProductInquires\IndexProductInquireData;
use Domain\Shops\Enums\ProductInquireStatusEnum;
use Illuminate\Database\Eloquent\Builder;

final class IndexProductInquireAction
{
    public function __invoke(IndexProductInquireData $data)
    {
        $search = $data->search_text;

        $productInquires = ProductInquire::query()->select(['id', 'shop_id', 'product_id', 'question', 'status'])
            ->when($search, fn (Builder $query) => $query->whereHas(
                'product',
                fn (Builder $query) => $query->where('name', 'like', "%{$search}%")
            ));

        $this->filterStatus($productInquires, $data->status);

        return $productInquires->sort(['created_at'], $data->sorts)->paginate($data->per_page);
    }

    private function filterStatus(Builder $query, string $status = null): void
    {
        $query->when(
            $status,
            fn (Builder $query) => $query->where('status', ProductInquireStatusEnum::getValue($status))
        );
    }
}
