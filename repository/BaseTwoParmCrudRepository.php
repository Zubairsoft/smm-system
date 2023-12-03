<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;

abstract class BaseTwoParmCrudRepository
{
    protected $model;

    protected $relationship;

    abstract protected function setData();

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function __construct()
    {
        $this->setData();
    }


    public function index($id)
    {
        $model = app($this->model)->query()->findOrFail($id);

        return  $model->{$this->relationship};
    }

    public function store($data, string $id): Model
    {
        $model = app($this->model)->query()->findOrFail($id);

        $model = $model->{$this->relationship}()->create($data->toArray());

        return $model;
    }

    public function show(string $id, string $modelId): Model
    {
        $model = app($this->model)->query()->findOrFail($id);

        return $model->{$this->relationship}()->findOrFail($modelId);
    }

    public function update($data, string $id, string $modelId): Model
    {
        $model = app($this->model)->query()->findOrFail($id);

        $model = $model->{$this->relationship}()->findOrFail($modelId);

        $model->update($data->toArray());

        return $model->refresh();
    }

    public function destroy(string $id, string $modelId): void
    {
        $model = app($this->model)->query()->findOrFail($id);

        $model = $model->{$this->relationship}()->findOrFail($modelId);;

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
