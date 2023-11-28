<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Shops\ShopResource;
use Domain\Dashboard\DataTransferToObject\Shops\StoreShopData;
use Domain\Dashboard\DataTransferToObject\Shops\UpdateShopData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Repository\ShopRepository;

class ShopController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = new ShopRepository();
    }
    public function index()
    {
    }

    public function store(StoreShopData $request): JsonResponse
    {
        $shop = $this->repository->store($request, 'avatar');

        return sendSuccessResponse(message: __('messages.create_data'), data: ShopResource::make($shop));
    }

    public function show(string $id): JsonResponse
    {
        $shop = $this->repository->show($id);

        return sendSuccessResponse(message: __('messages.get_data'), data: ShopResource::make($shop));
    }

    public function update(UpdateShopData $request, string $id): JsonResponse
    {
        $shop = $this->repository->update($request, $id, 'avatar');

        return sendSuccessResponse(message: __('messages.update_data'), data: ShopResource::make($shop));
    }

    public function destroy(string $id): JsonResponse
    {
        $this->repository->destroy($id);

        return sendSuccessResponse(message: __('messages.delete_data'));
    }
}
