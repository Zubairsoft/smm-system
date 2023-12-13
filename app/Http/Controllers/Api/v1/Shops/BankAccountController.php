<?php

namespace App\Http\Controllers\Api\v1\Shops;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shops\BanKAccounts\BankAccountResource;
use App\Http\Resources\Shops\BanKAccounts\BankAccountsResource;
use Domain\Shops\DataTransferToObject\BankAccounts\StoreBankAccountData;
use Domain\Shops\DataTransferToObject\BankAccounts\UpdateBankAccountData;
use Illuminate\Http\JsonResponse;
use Repository\BankAccountRepository;

class BankAccountController extends Controller
{

    public function __construct(private BankAccountRepository $repository)
    {
    }

    public function index(): JsonResponse
    {
        $bankAccounts = $this->repository->index($this->currentUser('shop-api')->id);

        return sendSuccessResponse(__('messages.get_data'), BankAccountsResource::collection($bankAccounts));
    }

    public function store(StoreBankAccountData $request): JsonResponse
    {
        $bankAccount = $this->repository->store($request, $this->currentUser('shop-api')->id);

        return sendSuccessResponse(__('messages.create_data'), BankAccountResource::make($bankAccount));
    }

    public function show(string $id): JsonResponse
    {
        $bankAccount = $this->repository->show($this->currentUser('shop-api')->id, $id);

        return sendSuccessResponse(__('messages.get_data'), BankAccountResource::make($bankAccount));
    }

    public function update(UpdateBankAccountData $request, string $id): JsonResponse
    {
        $bankAccount = $this->repository->update($request, $this->currentUser('shop-api')->id, $id);

        return sendSuccessResponse(__('messages.update_data'), BankAccountResource::make($bankAccount));
    }

    public function destroy(string $id)
    {
        $this->repository->destroy($this->currentUser('shop-api')->id, $id);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}
