<?php

namespace App\Http\Controllers\Api\v1\Supports\lists;

use App\Http\Controllers\Controller;
use App\Http\Resources\Supports\Lists\ListResource;
use Illuminate\Http\JsonResponse;
use Repository\ProductAttributeRepository;

class ListProductAttributeController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $product_attributes = (new ProductAttributeRepository())->list();

        return sendSuccessResponse(__('messages.get_data'), ListResource::collection($product_attributes));
    }
}
