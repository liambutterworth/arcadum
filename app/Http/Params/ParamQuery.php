<?php

namespace App\Http\Params;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class ParamQuery
{
    protected string $model;
    protected array $params = [];

    protected array $map = [
        'filter' => FilterParam::class,
        // 'include' => IncludeParam::class,
        // 'limit' => LimitParam::class,
        // 'sort' => SortParam::class,
    ];

    public function __construct()
    {
        foreach ($this->map as $name => $class) {
            $this->params[$name] = new $class;
        }
    }

    public function __get(string $name)
    {
        if (in_array($name, array_keys($this->params))) {
            return $this->params[$name];
        }
    }

    public function for(string $model)
    {
        $this->model = $model;
    }

    public function validate(): void
    {
        $rules = [];
        $messages = [];

        foreach ($this->params as $param) {
            $rules = array_merge($rules, $param->rules());
            $messages = array_merge($messages, $param->messages());
        }

        $validator = Validator::make(request()->all(), $rules, $messages);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }

    public function execute(): Builder
    {
        $query = $this->model::query();

        foreach ($this->params as $param) {
            $param->apply($query);
        }

        return $query;
    }

    public function get()
    {
        $this->validate();
        $query = $this->execute();

        if (request()->has('page')) {
            return $query->paginate();
        } else {
            return $query->get();
        }
    }

    public function find(int $id)
    {
        $this->validate();
        $query = $this->execute();
        return $this->query->find($id);
    }
}
