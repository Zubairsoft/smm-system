<?php

namespace App\Http\Controllers\Api\v1\Shops;

use App\Http\Controllers\Controller;
use App\Http\Resources\Shops\Coupons\CouponResource;
use Domain\Shops\DataTransferToObject\Coupons\StoreCouponData;
use Domain\Shops\DataTransferToObject\Coupons\UpdateCouponData;
use Repository\CouponRepository;

class CouponController extends Controller
{
    public function __construct(private CouponRepository $repository)
    {
    }

    public function index()
    {
        $coupons = $this->repository->index(currentUser(config('auth.shop-api-guard'))->id);

        return sendSuccessResponse(__('messages.get_data'), CouponResource::collection($coupons));
    }

    public function store(StoreCouponData $request)
    {
        $coupon = $this->repository->store($request, currentUser(config('auth.shop-api-guard'))->id);

        return sendSuccessResponse(__('messages.create_data'), CouponResource::make($coupon));
    }

    public function show(string $id)
    {
        $coupon = $this->repository->show(currentUser(config('auth.shop-api-guard'))->id, $id);

        return sendSuccessResponse(__('messages.get_data'), CouponResource::make($coupon));
    }

    public function update(UpdateCouponData $request, string $id)
    {
        $coupon = $this->repository->update($request, currentUser(config('auth.shop-api-guard'))->id, $id);

        return sendSuccessResponse(__('messages.update_data'), CouponResource::make($coupon));
    }

    public function destroy(string $id)
    {
        $this->repository->destroy(currentUser(config('auth.shop-api-guard'))->id, $id);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}
