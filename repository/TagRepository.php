<?php

namespace Repository;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Collection;

class TagRepository extends BaseRepository
{
    protected $model;

    protected function setData()
    {
        $this->model = Tag::class;
    }

    public function list(): Collection
    {
        return app($this->model)->query()->active()->get();
    }
}
