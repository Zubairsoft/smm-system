<?php

namespace Repository;

use App\Models\DeliveryWorker;

class DeliveryWorkerRepository extends BaseRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = DeliveryWorker::class;
    }

}
