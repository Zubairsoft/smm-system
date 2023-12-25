<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Tags\TagResource;
use Domain\Dashboard\DataTransferToObject\Tags\StoreTagData;
use Domain\Dashboard\DataTransferToObject\Tags\UpdateTagData;
use Illuminate\Http\JsonResponse;
use Repository\TagRepository;

class TagController extends Controller
{
    public function __construct(private TagRepository $repository)
    {
    }

    public function index(): JsonResponse
    {
        $tags = $this->repository->index();

        return sendSuccessResponse(__('messages.get_data'), TagResource::collection($tags));
    }

    public function store(StoreTagData $request): JsonResponse
    {
        $tag = $this->repository->store($request);

        return sendSuccessResponse(__('messages.create_data'), TagResource::make($tag));
    }

    public function show(string $id): JsonResponse
    {
        $tag = $this->repository->show($id);

        return sendSuccessResponse(__('messages.get_data'), TagResource::make($tag));
    }

    public function update(UpdateTagData $request, string $id): JsonResponse
    {
        $tag = $this->repository->update($request, $id);

        return sendSuccessResponse(__('messages.update_data'), TagResource::make($tag));
    }

    public function destroy(string $id): JsonResponse
    {
        $this->repository->destroy($id);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}
