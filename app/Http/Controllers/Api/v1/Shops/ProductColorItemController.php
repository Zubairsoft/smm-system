<?php

namespace App\Http\Controllers\Api\v1\Shops;

use App\Http\Controllers\Controller;
use Domain\Shops\DataTransferToObject\ProductColorItems\StoreProductColorItemData;
use Domain\Shops\DataTransferToObject\ProductColorItems\UpdateProductColorItemData;
use Illuminate\Http\JsonResponse;
use Repository\ProductColorItemRepository;

class ProductColorItemController extends Controller
{
    public function __construct(private ProductColorItemRepository $repository)
    {
    }

    public function index(string $id, string $productItemId): JsonResponse
    {
        $productItem = $this->repository->checkProductItem($id, $productItemId);

        return sendSuccessResponse(__('messages.get_data'), $this->repository->index($productItem->id));
    }

    public function store(StoreProductColorItemData $request, string $id, string $productItemId)
    {
        $productItem = $this->repository->checkProductItem($id, $productItemId);

        return sendSuccessResponse(__('messages.create_data'), $this->repository->store($request, $productItem->id));
    }

    public function show(string $id, string $productItemId, string $productColorItemId): JsonResponse
    {
        $productItem = $this->repository->checkProductItem($id, $productItemId);

        return sendSuccessResponse(__('messages.get_data'), $this->repository->show($productItem->id, $productColorItemId));
    }

    public function update(UpdateProductColorItemData $request, string $id, string $productItemId, string $productColorItemId)
    {
        $productItem = $this->repository->checkProductItem($id, $productItemId);

        return sendSuccessResponse(__('messages.create_data'), $this->repository->update($request, $productItem->id, $productColorItemId));
    }

    public function destroy(string $id, string $productItemId, string $productColorItemId): JsonResponse
    {
        $productItem = $this->repository->checkProductItem($id, $productItemId);

        $this->repository->destroy($productItem->id, $productColorItemId);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}
