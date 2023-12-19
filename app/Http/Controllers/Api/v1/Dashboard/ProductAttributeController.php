<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\ProductAttributes\ProductAttributeResource;
use Domain\Dashboard\DataTransferToObject\ProductAttributes\StoreProductAttributeData;
use Domain\Dashboard\DataTransferToObject\ProductAttributes\UpdateProductAttributeData;
use Illuminate\Http\JsonResponse;
use Repository\ProductAttributeRepository;

class ProductAttributeController extends Controller
{
    public function __construct(private ProductAttributeRepository $repository)
    {
    }

    public function index(): JsonResponse
    {
        $productAttributes = $this->repository->index();

        return sendSuccessResponse(__('messages.get_data'), ProductAttributeResource::collection($productAttributes));
    }

    public function store(StoreProductAttributeData $request): JsonResponse
    {
        $productAttribute = $this->repository->store($request);

        return sendSuccessResponse(__('messages.create_data'), ProductAttributeResource::make($productAttribute));
    }

    public function show(string $id): JsonResponse
    {
        $productAttribute = $this->repository->show($id);

        return sendSuccessResponse(__('messages.get_data'), ProductAttributeResource::make($productAttribute));
    }

    public function update(UpdateProductAttributeData $request, string $id): JsonResponse
    {
        $productAttribute = $this->repository->update($request, $id);

        return sendSuccessResponse(__('messages.update_data'), ProductAttributeResource::make($productAttribute));
    }

    public function destroy(string $id): JsonResponse
    {
        $this->repository->destroy($id);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}
