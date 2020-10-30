<?php

namespace App\Repositories;

use App\Contracts\Repository as Contract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class Repository implements Contract
{
    protected Model $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    private function filter(array $filters): Builder
    {
        $query = $this->model->query();

        foreach ($filters as $filter) {
            $filter->apply($query);
        }

        return $query;
    }

    public function all(?array $filters = []): Collection
    {

        return $query->get();
    }

    public function paginate(?array $filters = []): Collection
    {
        $query = $this->model->query();

        foreach ($filters as $filter) {
            $filter->apply($query);
        }

        return $query->paginate($perPage);
    }

    public function applyFilter(Filter $filter)
    {
        return $
    }

    public function filter(array $filters): Collection
    {
        $query = $this->model->query();

        foreach ($filters as $filter) {
            $filter->apply($query);
        }

        return $query->get();
    }

    public function find(int $id): Model
    {
        return $this->model->find($id);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update(int $id, array $data): Model
    {
        return $this->model->find($id)->save($data);
    }

    public function delete(int $id): void
    {
        $this->model->delete($id);
    }
}
