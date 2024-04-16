<?php

namespace Repository;

use App\Models\Color;
use Illuminate\Database\Eloquent\Collection;

class ColorRepository extends BaseRepository
{
    protected $model;

    protected bool $protectedFromDelete = true;

    protected function setData()
    {
        $this->model = Color::class;
    }

    public function list(): Collection
    {
        return app($this->model)->query()->active()->get();
    }
}
