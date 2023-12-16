<?php

namespace Repository;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository extends BaseRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = Category::class;
    }

    public function list(): Collection
    {
        return app($this->model)->query()->active()->get();
    }
}
