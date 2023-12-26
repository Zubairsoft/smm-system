<?php

namespace App\Http\Controllers\Api\v1\Shops;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shops\Products\ProductResource;
use Domain\Shops\Actions\Products\StoreProductAction;
use Domain\Shops\Actions\Products\UpdateProductAction;
use Domain\Shops\DataTransferToObject\Products\StoreProductData;
use Domain\Shops\DataTransferToObject\Products\UpdateProductData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Repository\ProductRepository;

class ProductController extends Controller
{
   public function __construct(private ProductRepository $repository)
   {
   }

   public function index(): JsonResponse
   {
      $products = $this->repository->index(currentUser(config('auth.shop-api-guard'))->id);

      return sendSuccessResponse(__('messages.get_data'), ProductResource::collection($products));
   }

   public function store(StoreProductData $request): JsonResponse
   {
      $product = app(StoreProductAction::class)($request);

      return sendSuccessResponse(__('messages.create_data'), $product);
   }

   public function show(string $id): JsonResponse
   {
      $product = $this->repository->show(currentUser(config('auth.shop-api-guard'))->id, $id);

      return sendSuccessResponse(__('messages.get_data'), $product);
   }

   public function update(UpdateProductData $request, string $id): JsonResponse
   {
      $product = app(UpdateProductAction::class)($request, $id);

      return sendSuccessResponse(__('messages.update_data'), $product);
   }

   public function destroy(string $id): JsonResponse
   {
      $this->repository->destroy(currentUser(config('auth.shop-api-guard'))->id, $id);

      return sendSuccessResponse(__('messages.delete_data'));
   }

}
