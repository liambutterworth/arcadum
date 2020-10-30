<?php

namespace App\Http\Params\Filters;

class StringFilter extends Filter
{
    public function rules()
    {
        return [
            'string',
        ];
    }

    public function apply($query, $value)
    {
        $query->where($this->name, $value);
    }
}
