<?php

namespace App\Http\Params;

use Illuminate\Support\Arr;

abstract class Param
{
    abstract public function apply($query);

    public function rules()
    {
        return [];
    }

    public function messages()
    {
        return [];
    }
}
