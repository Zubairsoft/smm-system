<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Brands\BrandResource;
use Domain\Dashboard\DataTransferToObject\Brands\StoreBrandData;
use Domain\Dashboard\DataTransferToObject\Brands\UpdateBrandData;
use Illuminate\Http\JsonResponse;
use Repository\BrandRepository;

class BrandController extends Controller
{
    public function __construct(private BrandRepository $repository)
    {
    }

    public function index(): JsonResponse
    {
        $brands = $this->repository->index();

        return sendSuccessResponse(__('messages.get_data'), BrandResource::collection($brands));
    }

    public function store(StoreBrandData $request): JsonResponse
    {
        $brand = $this->repository->store($request);

        $this->repository->addMedia($request,$brand,'image','image');

        return sendSuccessResponse(__('messages.create_data'), BrandResource::make($brand));
    }

    public function show(string $id): JsonResponse
    {
        $brand = $this->repository->show($id);

        return sendSuccessResponse(__('messages.get_data'), BrandResource::make($brand));
    }

    public function update(UpdateBrandData $request, string $id): JsonResponse
    {
        $brand = $this->repository->update($request, $id);

        $this->repository->addMedia($request,$brand,'image','image');

        return sendSuccessResponse(__('messages.get_data'), BrandResource::make($brand));
    }

    public function destroy(string $id): JsonResponse
    {
        $this->repository->destroy($id);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}
