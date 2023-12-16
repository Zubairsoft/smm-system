<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Categories\CategoryResource;
use Domain\Dashboard\DataTransferToObject\Categories\StoreCategoryData;
use Domain\Dashboard\DataTransferToObject\Categories\UpdateCategoryData;
use Illuminate\Http\JsonResponse;
use Repository\CategoryRepository;

class CategoryController extends Controller
{
    public function __construct(
        private CategoryRepository $repository,
    ) {
    }

    public function index()
    {
        $categories = $this->repository->index();

        return sendSuccessResponse(__('messages.get_data'), CategoryResource::collection($categories));
    }

    public function store(StoreCategoryData $data): JsonResponse
    {
        $category = $this->repository->store($data);

        $this->repository->addMedia($data, $category, 'image', 'image');

        $this->repository->addMedia($data, $category, 'cover_image', 'cover_image');

        return sendSuccessResponse(__('messages.create_data'), CategoryResource::make($category));
    }

    public function show(string $id): JsonResponse
    {
        $category = $this->repository->show($id);

        return sendSuccessResponse(__('messages.get_data'), CategoryResource::make($category));
    }

    public function update(UpdateCategoryData $data, string $id)
    {
        $category = $this->repository->update($data, $id);

        $this->repository->addMedia($data, $category, 'image', 'image');

        $this->repository->addMedia($data, $category, 'cover_image', 'cover_image');

        return sendSuccessResponse(__('messages.update_date'), CategoryResource::make($category));
    }

    public function destroy(string $id): JsonResponse
    {
        $this->repository->destroy($id);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}
