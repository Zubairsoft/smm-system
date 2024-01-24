<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\PromotionalOffers\PromotionalOfferResource;
use Domain\Dashboard\DataTransferToObject\PromotionalOffers\StorePromotionalOfferData;
use Illuminate\Http\JsonResponse;
use Repository\PromotionalOfferRepository;

class PromotionalOfferController extends Controller
{
    public function __construct(private PromotionalOfferRepository $repository)
    {
    }

    public function index()
    {
        return sendSuccessResponse(__('messages.get_data'), PromotionalOfferResource::collection($this->repository->index()));
    }

    public function store(StorePromotionalOfferData $request): JsonResponse
    {
        $promotionalOffer = $this->repository->productKey('product_ids')->store($request);

        return sendSuccessResponse(__('messages.create_data'), PromotionalOfferResource::make($promotionalOffer));
    }

    public function show(string $id): JsonResponse
    {
        return sendSuccessResponse(__('messages.get_data'), PromotionalOfferResource::make($this->repository->show($id)));
    }

    public function update(StorePromotionalOfferData $request, string $id): JsonResponse
    {
        $promotionalOffer = $this->repository->productKey('product_ids')->update($request, $id);

        return sendSuccessResponse(__('messages.update_data'), PromotionalOfferResource::make($promotionalOffer));
    }

    public function destroy(string $id): JsonResponse
    {
        $this->repository->destroy($id);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}
