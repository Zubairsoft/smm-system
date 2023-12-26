<?php

namespace App\Http\Controllers\Api\v1\Supports\lists;

use App\Http\Controllers\Controller;
use App\Http\Resources\Supports\Lists\ListResource;
use Illuminate\Http\JsonResponse;
use Repository\ProductAttributeDetailRepository;

class ListProductAttributeDetailController extends Controller
{
    public function __invoke(string $id): JsonResponse
    {
        $product_attributes_details = (new ProductAttributeDetailRepository())->list($id);

        return sendSuccessResponse(__('messages.get_data'), ListResource::collection($product_attributes_details));
    }
}
