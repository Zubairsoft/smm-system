<?php

namespace App\Http\Controllers\Api\v1\Supports\lists;

use App\Http\Controllers\Controller;
use App\Http\Resources\Supports\Lists\BankResource;
use Illuminate\Http\JsonResponse;
use Repository\BankRepository;

class ListBankController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $banks = (new BankRepository())->list();

        return sendSuccessResponse(__('messages.get_data'), BankResource::collection($banks));
    }
}
