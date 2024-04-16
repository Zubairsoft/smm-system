<?php

namespace App\Http\Controllers\Api\v1\Shops;

use App\Http\Controllers\Controller;
use Domain\Shops\DataTransferToObject\ProductItems\StoreProductItemData;
use Domain\Shops\DataTransferToObject\ProductItems\UpdateProductItemData;
use Illuminate\Http\JsonResponse;
use Repository\ProductItemRepository;

class ProductItemController extends Controller
{
    public function __construct(private ProductItemRepository $repository)
    {
    }

    public function index(string $id): JsonResponse
    {
        return sendSuccessResponse(__('messages.get_data'), $this->repository->index($id));
    }

    public function store(StoreProductItemData $request, string $id): JsonResponse
    {
        $productItem = $this->repository->store($request, $id);

        return sendSuccessResponse(__('messages.create_data'), $productItem);
    }

    public function show(string $id, string $productItemId): JsonResponse
    {
        return sendSuccessResponse(__('messages.get_data'), $this->repository->show($id, $productItemId));
    }

    public function update(UpdateProductItemData $request, string $id, string $productItemId): JsonResponse
    {
        $productItem = $this->repository->update($request, $id, $productItemId);

        return sendSuccessResponse(__('messages.update_data'), $productItem);
    }

    public function destroy(string $id, string $productItemId): JsonResponse
    {
        $this->repository->destroy($id, $productItemId);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}
