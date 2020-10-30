<?php

namespace App\Http\Params\Filters;

abstract class Filter
{
    public $name;
    public $defualt;

    abstract public function apply($query, $value);

    public function __construct($name, $default = null)
    {
        $this->name = $name;
        $this->default = $default;
    }

    public function rules()
    {
        return [];
    }

    public function messages()
    {
        return [];
    }
}
