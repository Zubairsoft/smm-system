<?php

namespace App\Http\Controllers\Api\v1\Shops;

use App\Http\Controllers\Controller;
use Domain\Shops\Actions\SupportTickets\StoreSupportTicketAction;
use Domain\Shops\DataTransferToObject\SupportTickets\StoreSupportTicketData;
use Illuminate\Http\JsonResponse;
use Repository\SupportTicketRepository;

class SupportTicketController extends Controller
{
    public function __construct(
        private SupportTicketRepository $repository
    ) {
    }
    public function store(StoreSupportTicketData $request): JsonResponse
    {
        $shop = currentUser('shop-api');

        $supportTicket = (new StoreSupportTicketAction)($shop, $request);

        $this->repository->addMedia($request, $supportTicket, 'attachment', 'attachment');

        return sendSuccessResponse(__('messages.create_data'));
    }
}
