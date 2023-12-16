<?php

namespace Repository;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Collection;

class BrandRepository extends BaseRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = Brand::class;
    }

    public function list(): Collection
    {
        return app($this->model)->query()->active()->get();
    }
}
