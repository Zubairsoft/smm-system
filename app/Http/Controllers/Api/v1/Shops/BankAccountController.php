<?php

namespace App\Http\Controllers\Api\v1\Shops;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use Domain\Shops\DataTransferToObject\BankAccounts\StoreBankAccountData;
use Domain\Shops\DataTransferToObject\BankAccounts\UpdateBankAccountData;
use Illuminate\Http\JsonResponse;
use Repository\BankAccountRepository;

class BankAccountController extends Controller
{
    private Shop  $currentUser;

    private BankAccountRepository $repository;

    public function __construct()
    {
        $this->repository = new BankAccountRepository();
        $this->currentUser = currentUser('shop-api');
    }

    public function index(): JsonResponse
    {
        $bankAccounts = $this->repository->index($this->currentUser->id);

        return sendSuccessResponse(__('messages.get_data'), $bankAccounts);
    }

    public function store(StoreBankAccountData $request): JsonResponse
    {
        $bankAccount = $this->repository->store($request, $this->currentUser->id);

        return sendSuccessResponse(__('messages.create_data'), $bankAccount);
    }

    public function show(string $id): JsonResponse
    {
        $bankAccount = $this->repository->show($this->currentUser->id, $id);

        return sendSuccessResponse(__('messages.get_data'), $bankAccount);
    }

    public function update(UpdateBankAccountData $request, string $id): JsonResponse
    {
        $bankAccount = $this->repository->update($request, $this->currentUser->id, $id);

        return sendSuccessResponse(__('messages.create_data'), $bankAccount);
    }

    public function destroy(string $id)
    {
        $this->repository->destroy($this->currentUser->id, $id);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}
