<?php

namespace App\Http\Controllers\Api\v1\Supports\lists;

use App\Http\Controllers\Controller;
use App\Http\Resources\Supports\Lists\ListResource;
use Illuminate\Http\JsonResponse;
use Repository\CategoryRepository;

class ListCategoryController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $categories = (new CategoryRepository())->list();

        return sendSuccessResponse(__('messages.get_data'), ListResource::collection($categories));
    }
}
