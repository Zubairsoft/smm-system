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

    public function store($data, string $file = null): Model
    {
        $model = app($this->model)->query()->create($data->toArray());

        if ($file) {
            if (isFile($data->{$file})) {
                $model->addMedia($data->{$file})->toMediaCollection('avatar');
            }
          }
        return $model;
    }

    public function show($id): Model
    {
        return app($this->model)->query()->findOrFail($id);
    }

    public function update($data, string $id, string $file = null): Model
    {
        $model = app($this->model)->query()->findOrFail($id);

        $model->update($data->toArray());

      if ($file) {
        if (isFile($data->{$file})) {
            $model->addMedia($data->{$file})->toMediaCollection('avatar');
        }
      }

        return $model->refresh();
    }

    public function destroy($id): void
    {
        $model = app($this->model)->query()->findOrFail($id);

        $model->delete();
    }
}
