<?php

namespace Repository;

use App\Models\ProductAttribute;
use Illuminate\Database\Eloquent\Collection;

class ProductAttributeDetailRepository extends BaseTwoParmCrudRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = ProductAttribute::class;

        $this->relationship = 'productAttributeDetails';
    }

    public function list(string $id): Collection
    {
        $model = app($this->model)->query()->findOrFail($id);

        return  $model->{$this->relationship}()->active()->get();
    }
}
