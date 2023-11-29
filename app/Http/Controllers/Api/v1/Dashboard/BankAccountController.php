<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Http\Controllers\Controller;
use Domain\Dashboard\DataTransferToObject\BankAccounts\StoreBankAccountData;
use Domain\Dashboard\DataTransferToObject\BankAccounts\UpdateBankAccountData;
use Illuminate\Http\JsonResponse;
use Repository\BankAccountRepository;

class BankAccountController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = new BankAccountRepository();
    }

    public function index(): JsonResponse
    {
        $bankAccounts = $this->repository->index();

        return sendSuccessResponse(message: __('messages.get_data'), data: $bankAccounts);
    }

    public function store(StoreBankAccountData $request,string $id): JsonResponse
    {
        $bankAccount = $this->repository->storeBankAccount($request,$id);

        return sendSuccessResponse(message: __('messages.create_data'), data: $bankAccount);
    }

    public function show(string $id): JsonResponse
    {
        $bankAccount = $this->repository->show($id);

        return sendSuccessResponse(message: __('messages.get_data'), data: $bankAccount);
    }

    public function update(UpdateBankAccountData $request, string $id): JsonResponse
    {
        $bankAccount = $this->repository->update($request, $id, 'avatar');

        return sendSuccessResponse(message: __('messages.update_data'), data: $bankAccount);
    }

    public function destroy(string $id): JsonResponse
    {
        $this->repository->destroy($id);

        return sendSuccessResponse(message: __('messages.delete_data'));
    }
}
