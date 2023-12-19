<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\ProductAttributes\ProductAttributeDetailResource;
use Domain\Dashboard\DataTransferToObject\ProductAttributeDetails\StoreProductAttributeDetailData;
use Domain\Dashboard\DataTransferToObject\ProductAttributeDetails\UpdateProductAttributeDetailData;
use Illuminate\Http\JsonResponse;
use Repository\ProductAttributeDetailRepository;

class ProductAttributeDetailController extends Controller
{
    public function __construct(private ProductAttributeDetailRepository $repository)
    {
    }

    public function index(string $id): JsonResponse
    {
        $productAttributeDetail = $this->repository->index($id);

        return sendSuccessResponse(__('messages.get_data'), ProductAttributeDetailResource::collection($productAttributeDetail));
    }

    public function store(StoreProductAttributeDetailData $request, string $id): JsonResponse
    {
        $productAttributeDetail = $this->repository->store($request, $id);

        return sendSuccessResponse(__('messages.create_data'), ProductAttributeDetailResource::make($productAttributeDetail));
    }

    public function show(string $id, string $productAttributeDetailId): JsonResponse
    {
        $productAttributeDetail = $this->repository->show($id, $productAttributeDetailId);

        return sendSuccessResponse(__('messages.get_data'), ProductAttributeDetailResource::make($productAttributeDetail));
    }

    public function update(UpdateProductAttributeDetailData $request, string $id, string $productAttributeDetailId): JsonResponse
    {
        $productAttributeDetail = $this->repository->update($request, $id, $productAttributeDetailId);

        return sendSuccessResponse(__('messages.update_data'), ProductAttributeDetailResource::make($productAttributeDetail));
    }

    public function destroy(string $id, string $productAttributeDetailId): JsonResponse
    {
        $this->repository->destroy($id, $productAttributeDetailId);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}
