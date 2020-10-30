<?php

namespace App\Http\Requests;

use App\Http\Params\BooleanParam;
use App\Http\Params\DateParam;
use App\Http\Params\IncludeParam;
use App\Http\Params\NumberParam;
use App\Http\Params\RelationParam;
use App\Http\Params\SortParam;
use App\Http\Params\StringParam;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class QueryRequest extends FormRequest
{
    protected string $model;
    protected array $queryString;

    public function prepareForValidation()
    {
        $this->queryString = $this->all();
        $data = Arr::dot($this->queryString);
        $params = [];

        foreach ($data as $originalKey => $value) {
            $key = (string) Str::of($originalKey)->match('/^(.*?)(?=(?:$|:))/');
            $name = (string) Str::of($originalKey)->match('/^(?:.*\.)?(.*?)(?=(?:$|:))/');
            $operator = ((string) Str::of($originalKey)->match('/^.*:(.*?)$/')) ?: null;
            Arr::set($params, $key, compact('name', 'value', 'operator'));
        }

        $this->query->replace($params);
    }

    public function withValidator($validator)
    {
        foreach ($this->filters() as $key => $filter) {
            $filter::validate($validator, "filter.$key");
        }
    }

    public function rules()
    {
        return [
            'count.value' => 'nullable',
            'limit.value' => 'numeric|min:1|max:50',
            'page.value' => 'numeric|min:1',
            'sort.operator' => 'nullable|in:asc,desc',
            'sort.value' => Rule::in($this->sorts()),
            'include.value' => Rule::in($this->includes()),
        ];
    }

    public function messages()
    {
        $messages = [];

        if (empty($this->sorts())) {
            $messages['sort.value.in'] = 'Sorting is not allowed for this resource';
        } else {
            $messages['sort.operator.in'] = 'Sort operator must be one of: :value';
            $messages['sort.value.in'] = 'Sort value must be one of: :values';
        }

        if (empty($this->includes())) {
            $messages['include.value.in'] = 'Includes are not allowed for this resource';
        } else {
            $messages['include.value.in'] = 'Include value must be one of: :values';
        }

        return $messages;
    }

    public function includes()
    {
        return [];
    }

    public function sorts()
    {
        return [];
    }

    public function filters()
    {
        return [];
    }

    public function execute()
    {
        $query = $this->model::query();

        foreach ($this->filters() as $key => $filter) {
            if ($this->has("filter.$key")) {
                $filter::apply($query, $this->get("filter.$key"));
            }
        }

        if ($this->has('sort')) {
            $query->orderBy($this->get('sort.value'), $this->get('sort.operator'));
        }

        if ($this->has('include')) {
            $query->with(explode(',', $this->get('include.value'));
        }

        if ($this->request->has('count')) {
            return $query->count();
        } else if ($this->request->has('page')) {
            return $query->paginate()->appends($this->queryString);
        } else {
            return $query->limit($this->input('limit', 10))->get();
        }
    }
}
