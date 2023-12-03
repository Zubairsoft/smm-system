<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Shops\BankAccountResource;
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

    public function index(string $id): JsonResponse
    {
        //TODO AVOID LAZY LOAD
        $bankAccounts = $this->repository->index($id);

        return sendSuccessResponse(message: __('messages.get_data'), data: BankAccountResource::collection($bankAccounts));
    }

    public function store(StoreBankAccountData $request, string $id): JsonResponse
    {
        $bankAccount = $this->repository->store($request, $id);

        return sendSuccessResponse(message: __('messages.create_data'), data: $bankAccount);
    }

    public function show(string $id, string $bankAccountId): JsonResponse
    {
        $bankAccount = $this->repository->show($id, $bankAccountId);

        return sendSuccessResponse(message: __('messages.get_data'), data: BankAccountResource::make($bankAccount->load('owner')));
    }

    public function update(UpdateBankAccountData $request, string $id, string $bankAccountId): JsonResponse
    {
        $bankAccount = $this->repository->update($request, $id, $bankAccountId);

        return sendSuccessResponse(message: __('messages.update_data'), data: BankAccountResource::make($bankAccount->load('owner')));
    }

    public function destroy(string $id, string $bankAccountId): JsonResponse
    {
        $this->repository->destroy($id, $bankAccountId);

        return sendSuccessResponse(message: __('messages.delete_data'));
    }
}
