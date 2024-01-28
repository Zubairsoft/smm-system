<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Advertisements\AdvertisementResource;
use Domain\Dashboard\DataTransferToObject\Advertisements\StoreAdvertisementData;
use Domain\Dashboard\DataTransferToObject\Advertisements\UpdateAdvertisementData;
use Illuminate\Http\JsonResponse;
use Repository\AdvertisementRepository;

class AdvertisementController extends Controller
{
    public function __construct(private AdvertisementRepository $repository)
    {
    }

    public function index(): JsonResponse
    {
        return sendSuccessResponse(__('messages.get_data'), AdvertisementResource::collection($this->repository->index()));
    }

    public function store(StoreAdvertisementData $request): JsonResponse
    {
        $advertisement = $this->repository->store($request);

        $this->repository->addMedia($request, $advertisement, 'image', 'image');

        return sendSuccessResponse(__('messages.create_data'), AdvertisementResource::make($advertisement));
    }

    public function show(string $id)
    {
        $advertisement = $this->repository->show($id);

        return sendSuccessResponse(__('messages.get_data'), AdvertisementResource::make($advertisement));
    }

    public function update(UpdateAdvertisementData $request, string $id): JsonResponse
    {
        $advertisement = $this->repository->update($request, $id);

        $this->repository->addMedia($request, $advertisement, 'image', 'image');

        return sendSuccessResponse(__('messages.update_data'), AdvertisementResource::make($advertisement));
    }

    public function destroy(string $id)
    {
        $this->repository->destroy($id);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}
