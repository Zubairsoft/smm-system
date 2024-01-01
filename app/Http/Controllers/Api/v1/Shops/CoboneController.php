<?php

namespace App\Http\Controllers\Api\v1\Shops;

use App\Http\Controllers\Controller;
use Domain\Shops\DataTransferToObject\Cobones\StoreCoboneData;
use Repository\CoboneRepository;

class CoboneController extends Controller
{
    public function __construct(private CoboneRepository $repository)
    {
    }

    public function index()
    {
        $cobones = $this->repository->index(currentUser(config('auth.shop-api-guard'))->id);

        return sendSuccessResponse(__('messages.get_data'), $cobones);
    }

    public function store(StoreCoboneData $request)
    {
        $cobone = $this->repository->store($request, currentUser(config('auth.shop-api-guard'))->id);

        return sendSuccessResponse(__('messages.create_data'), $cobone);
    }

    public function show(string $id)
    {
        $cobone = $this->repository->show(currentUser(config('auth.shop-api-guard'))->id, $id);

        return sendSuccessResponse(__('messages.get_data'), $cobone);
    }

    public function update(StoreCoboneData $request, string $id)
    {
        $cobone = $this->repository->update($request, currentUser(config('auth.shop-api-guard'))->id, $id);

        return sendSuccessResponse(__('messages.update_data'), $cobone);
    }

    public function destroy(string $id)
    {
        $this->repository->destroy(currentUser(config('auth.shop-api-guard'))->id, $id);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}