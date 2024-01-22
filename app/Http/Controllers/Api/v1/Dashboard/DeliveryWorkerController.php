<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\DeliveryWorkers\DeliveryWorkerResource;
use Domain\Dashboard\DataTransferToObject\DeliveryWorkers\StoreDeliveryWorkerData;
use Domain\Dashboard\DataTransferToObject\DeliveryWorkers\UpdateDeliveryWorkerData;
use Illuminate\Http\JsonResponse;
use Repository\DeliveryWorkerRepository;

class DeliveryWorkerController extends Controller
{

    public function __construct(private DeliveryWorkerRepository $repository)
    {
    }

    public function index(): JsonResponse
    {
        return sendSuccessResponse(__('messages.get_data'), DeliveryWorkerResource::collection($this->repository->index()));
    }

    public function store(StoreDeliveryWorkerData $request): JsonResponse
    {
        $deliveryWorker = $this->repository->store($request);

        return sendSuccessResponse(__('messages.create_data'), DeliveryWorkerResource::make($deliveryWorker));
    }

    public function show(string $id): JsonResponse
    {
        return sendSuccessResponse(__('messages.get_data'), DeliveryWorkerResource::make($this->repository->show($id)));
    }

    public function update(UpdateDeliveryWorkerData $request, string $id): JsonResponse
    {
        $deliveryWorker = $this->repository->update($request, $id);

        return sendSuccessResponse(__('messages.update_data'), DeliveryWorkerResource::make($deliveryWorker));
    }

    public function destroy(string $id): JsonResponse
    {
        $this->repository->destroy($id);
        return sendSuccessResponse(__('messages.delete_data'));
    }
}
