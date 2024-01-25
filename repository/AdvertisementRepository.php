<?php

namespace Repository;

use App\Models\Advertisement;

class AdvertisementRepository extends BaseRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = Advertisement::class;
    }
}
