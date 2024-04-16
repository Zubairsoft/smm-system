<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Http\Controllers\Controller;
use Domain\Dashboard\DataTransferToObject\Banks\StoreColorData;
use Domain\Dashboard\DataTransferToObject\Banks\UpdateColorData;
use Illuminate\Http\JsonResponse;
use Repository\ColorRepository;

class ColorController extends Controller
{
    public function __construct(private ColorRepository $repository)
    {
    }

    public function index(): JsonResponse
    {
        return sendSuccessResponse(__('messages.get_data'), $this->repository->index());
    }

    public function store(StoreColorData $data): JsonResponse
    {
        $color = $this->repository->store($data);

        return sendSuccessResponse(__('messages.create_data'), $color);
    }

    public function show(string $id): JsonResponse
    {
        return sendSuccessResponse(__('messages.get_data'), $this->repository->show($id));
    }

    public function update(UpdateColorData $data, string $id): JsonResponse
    {
        $color = $this->repository->update($data, $id);

        return sendSuccessResponse(__('messages.update_data'), $color);
    }    
}
