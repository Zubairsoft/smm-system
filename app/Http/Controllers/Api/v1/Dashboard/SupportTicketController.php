<?php

namespace App\Http\Controllers\Api\v1\Dashboard;

use App\Http\Controllers\Controller;
use Domain\Dashboard\DataTransferToObject\SupportTickets\UpdateSupportTicketData;
use Domain\Dashboard\Requests\SupportTickets\UpdateSupportTicketRequest;
use Illuminate\Http\JsonResponse;
use Repository\SupportTicketRepository;

class SupportTicketController extends Controller
{
    public function __construct(
        private SupportTicketRepository $repository
    ) {
    }

    public function index(): JsonResponse
    {
        return sendSuccessResponse(__('messages.get_data'), $this->repository->index());
    }

    public function show(string $id): JsonResponse
    {
        return sendSuccessResponse(__('messages.get_data'), $this->repository->show($id));
    }

    public function update(UpdateSupportTicketRequest $request, string $id): JsonResponse
    {
        $supportTicket = $this->repository->update(UpdateSupportTicketData::from($request), $id);

        return sendSuccessResponse(__('messages.update_data'), $supportTicket);
    }

    public function destroy(string $id): JsonResponse
    {
        $this->repository->destroy($id);

        return sendSuccessResponse(__('messages.delete_data'));
    }
}
