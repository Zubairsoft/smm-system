<?php

namespace App\Http\Controllers\Api\v1\Dashboard\Wallets;

use App\Http\Controllers\Controller;
use Domain\Dashboard\Actions\Wallets\IndexWalletAction;
use Domain\Dashboard\DataTransferToObject\Wallets\IndexWalletData;
use Illuminate\Http\JsonResponse;

class WalletController extends Controller
{
    public function index(IndexWalletData $request): JsonResponse
    {
        $wallets = (new IndexWalletAction())($request);

        return sendSuccessResponse(__('messages.get_data'), $wallets);
    }
}
