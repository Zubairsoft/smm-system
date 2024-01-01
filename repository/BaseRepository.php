<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;

abstract class BaseRepository
{
    protected  $model;

    abstract protected function setData();

    public function setModel(string $model)
    {
        $this->model = $model;
    }

    protected function makeInstanceOfModel(): Model
    {
        return app($this->model);
    }

    public function __construct()
    {
        $this->setData();
    }


    public function index()
    {
        return  $this->makeInstanceOfModel()->query()->get();
    }

    public function store(Data $data): Model
    {
        $model = $this->makeInstanceOfModel()->query()->create($data->toArray());

        return $model->refresh();
    }

    public function show(string $id): Model
    {
        return  $this->find($id);
    }

    public function update(Data $data, string $id): Model
    {
        $model = $this->find($id);

        $model->update($data->toArray());

        return $model->refresh();
    }

    public function destroy(string $id): void
    {
        $model = $this->find($id);

        $model->delete();
    }

    public function addMedia(Data $data, Model $model, string $file, string $collection): void
    {
        if ($file) {
            if (isFile($data->{$file})) {
                $model->addMedia($data->{$file})->toMediaCollection($collection);
            }
        }
    }

    private function find(string $id): Model
    {
        return $this->makeInstanceOfModel()->query()->findOrFail($id);
    }
}
