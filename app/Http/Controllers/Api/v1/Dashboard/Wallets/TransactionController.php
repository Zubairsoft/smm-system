<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Wallets;

use App\Http\Controllers\Controller;
use Domain\Dashboard\Actions\Transactions\IndexTransactionAction;
use Domain\Dashboard\DataTransferToObject\Wallets\IndexTransactionData;
use Illuminate\Http\JsonResponse;

class TransactionController extends Controller
{
    public function index(IndexTransactionData $request, string $id): JsonResponse
    {
        $transaction = (new IndexTransactionAction())($request, $id);

        return sendSuccessResponse(__('messages.get_data'), $transaction);
    }
}
