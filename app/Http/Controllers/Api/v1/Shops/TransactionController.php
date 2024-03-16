<?php

namespace App\Http\Controllers\Api\v1\Shops;

use App\Http\Controllers\Controller;
use Domain\Shops\DataTransferToObject\Transactions\IndexTransactionData;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Repository\TransactionRepository;

class TransactionController extends Controller
{
    public function index(IndexTransactionData $data): JsonResponse
    {
        $wallet=Auth::user()->wallets()->where('currency',$data->currency)->firstOrFail();
        $transaction = (new TransactionRepository())->index($data,$wallet->id);
        return sendSuccessResponse(__('messages.get_data'),$transaction);
    }
}
