<?php

namespace Repository;

use App\Models\SupportTicket;

class SupportTicketRepository extends BaseRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = SupportTicket::class;
    }
}
