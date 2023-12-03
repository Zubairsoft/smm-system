<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Resources\Dashboard\Banks\BankResource;
use Domain\Dashboard\DataTransferToObject\Banks\StoreBankData;
use Domain\Dashboard\DataTransferToObject\banks\UpdateBankData;
use Illuminate\Http\JsonResponse;
use Repository\BankRepository;

class BankController extends Controller
{
    private $repository;

    public function __construct()
    {
        $this->repository = new BankRepository();
    }

    public function index(): JsonResponse
    {
        $banks = $this->repository->index();

        return sendSuccessResponse(message: __('messages.get_data'), data: BankResource::collection($banks));
    }

    public function store(StoreBankData $request): JsonResponse
    {
        $bank = $this->repository->store($request);

        return sendSuccessResponse(message: __('messages.create_data'), data: BankResource::make($bank));
    }

    public function show(string $id): JsonResponse
    {
        $bank = $this->repository->show($id);

        return sendSuccessResponse(message: __('messages.get_data'), data: BankResource::make($bank));
    }

    public function update(UpdateBankData $request, string $id): JsonResponse
    {
        $bank = $this->repository->update($request, $id);

        return sendSuccessResponse(message: __('messages.update_data'), data: BankResource::make($bank));
    }

    public function destroy(string $id): JsonResponse
    {
        $this->repository->destroy($id);

        return sendSuccessResponse(message: __('messages.delete_data'));
    }
}
