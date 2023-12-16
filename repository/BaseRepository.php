<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository
{
    protected $model;

    abstract protected function setData();

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function __construct()
    {
        $this->setData();
    }


    public function index()
    {
        return app($this->model)->query()->get();
    }

    public function store($data): Model
    {
        $model = app($this->model)->query()->create($data->toArray());

        return $model;
    }

    public function show(string $id): Model
    {
        return app($this->model)->query()->findOrFail($id);
    }

    public function update($data, string $id): Model
    {
        $model = app($this->model)->query()->findOrFail($id);

        $model->update($data->toArray());

        return $model->refresh();
    }

    public function destroy(string $id): void
    {
        $model = app($this->model)->query()->findOrFail($id);

        $model->delete();
    }

    public function addMedia($data, Model $model, string $file, string $collection): void
    {
        if ($file) {
            if (isFile($data->{$file})) {
                $model->addMedia($data->{$file})->toMediaCollection($collection);
            }
        }
    }
}
