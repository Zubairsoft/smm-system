<?php

namespace Repository;

use Illuminate\Database\Eloquent\Model;
use Spatie\LaravelData\Data;

abstract class BaseTwoParmCrudRepository
{
    protected $model;

    protected $relationship;

    abstract protected function setData();

    public function setModel($model)
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


    public function index(string $id)
    {
        $model = $this->find($id);

        return  $model->{$this->relationship};
    }

    public function store(Data $data, string $id): Model
    {
        $model = $this->find($id);

        $model = $model->{$this->relationship}()->create($data->toArray());

        return $model;
    }

    public function show(string $id, string $modelId): Model
    {
        $model = $this->find($id);

        return $model->{$this->relationship}()->findOrFail($modelId);
    }

    public function update(Data $data, string $id, string $modelId): Model
    {
        $model = $this->find($id);

        $model = $model->{$this->relationship}()->findOrFail($modelId);

        $model->update($data->toArray());

        return $model->refresh();
    }

    public function destroy(string $id, string $modelId): void
    {
        $model = $this->find($id);

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

    private function find(string $id): Model
    {
        return $this->makeInstanceOfModel()->query()->findOrFail($id);
    }
}
