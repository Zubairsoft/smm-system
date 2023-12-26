<?php

namespace App\Http\Controllers\Api\v1\Supports\lists;

use App\Http\Controllers\Controller;
use App\Http\Resources\Supports\Lists\ListResource;
use Illuminate\Http\JsonResponse;
use Repository\BrandRepository;

class ListBrandController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $brands = (new BrandRepository())->list();

        return sendSuccessResponse(__('messages.get_data'), ListResource::collection($brands));
    }
}
