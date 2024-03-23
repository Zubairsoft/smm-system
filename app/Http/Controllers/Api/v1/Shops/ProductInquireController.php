<?php

namespace App\Http\Controllers\Api\v1\Shops;

use App\Http\Controllers\Controller;
use Domain\Dashboard\Requests\ProductInquires\UpdateProductInquireRequest;
use Domain\Shops\Actions\ProductInquires\IndexProductInquireAction;
use Domain\Shops\Actions\ProductInquires\UpdateProductInquireAction;
use Domain\Shops\DataTransferToObject\ProductInquires\IndexProductInquireData;
use Domain\Shops\DataTransferToObject\ProductInquires\UpdateProductInquireData;
use Illuminate\Http\JsonResponse;
use Repository\ProductInquireRepository;

class ProductInquireController extends Controller
{
    public function __construct(private ProductInquireRepository $repository)
    {
    }
    public function index(IndexProductInquireData $request): JsonResponse
    {
        $productInquires = app(IndexProductInquireAction::class)($request);

        return sendSuccessResponse(__('messages.get_data'), $productInquires);
    }

    public function show(string $id): JsonResponse
    {
        return sendSuccessResponse(__('messages.get_data'), $this->repository->show($id));
    }

    public function update(UpdateProductInquireRequest $request, string $id): JsonResponse
    {
        $productInquire = app(UpdateProductInquireAction::class)(UpdateProductInquireData::from($request), $id);

        return sendSuccessResponse(__('messages.update_data'), $productInquire);
    }
}
