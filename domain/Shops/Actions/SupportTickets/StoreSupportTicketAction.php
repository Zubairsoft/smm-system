<?php

namespace Domain\Shops\Actions\SupportTickets;

use App\Models\Shop;
use App\Models\SupportTicket;
use Domain\Shops\DataTransferToObject\SupportTickets\StoreSupportTicketData;

final class StoreSupportTicketAction
{
    public function __invoke(Shop $shop, StoreSupportTicketData $data): SupportTicket
    {
        return $shop->supportTickets()->create($data->toArray());
    }
}
