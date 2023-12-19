<?php

namespace Repository;

use App\Models\ProductAttribute;
use Illuminate\Database\Eloquent\Collection;

class ProductAttributeRepository extends BaseRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = ProductAttribute::class;
    }

    public function list(): Collection
    {
        return app($this->model)->query()->active()->get();
    }
}
