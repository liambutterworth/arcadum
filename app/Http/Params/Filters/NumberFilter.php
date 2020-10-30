<?php

namespace App\Http\Params\Filters;

class NumberFilter extends Filter
{
    public function rules()
    {
        return [
            'numeric',
        ];
    }

    public function apply($query, $value)
    {
    }
}
