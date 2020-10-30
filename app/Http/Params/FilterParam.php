<?php

namespace App\Http\Params;

// use App\Http\Params\Filters\BooleanFilter;
// use App\Http\Params\Filters\DateFilter;
use App\Http\Params\Filters\StringFilter;
use Illuminate\Support\Arr;

class FilterParam extends Param
{
    protected array $filters = [];

    protected array $map = [
        // 'boolean' => BooleanFilter::class,
        // 'date' => DateFilter::class,
        // 'number' => NumberFilter::class,
        'string' => StringFilter::class,
        // 'relation' => RelationFilter::class,
    ];

    public function __call($name, $args)
    {
        if (in_array($name, array_keys($this->map))) {
            $this->filters[] = new $this->map[$name](...$args);
        }
    }

    public function has(string $name): bool
    {
        $has = false;
        $params = Arr::dot(request()->all());

        foreach ($params as $param) {
            
        }

        return $has;
    }

    public function get(string $name, $default): bool
    {
    }

    public function apply($query)
    {
        foreach ($this->filters as $filter) {
            dd($this->has("filter.{$filter->name}"));
            $value = request("filter.{$filter->name}", $filter->default);
            dd($filter->name, $value);

            // if ($value) {
            //     $filter->apply($query, $value);
            // }
        }
    }

    public function rules()
    {
        $rules = [];

        foreach ($this->filters as $filter) {
            $rules["filter.{$filter->name}"] = $filter->rules();
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [];

        foreach ($this->filters as $filter) {
            foreach ($filter->messages() as $rule => $message) {
                $messages["filter.{$filter->name}.$rule"] = $message;
            }
        }

        return $messages;
    }
}
