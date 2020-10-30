<?php

namespace App\Http\Params;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Validator;

abstract class Param
{
    const boolean = BooleanParam::class;
    const date = DateParam::class;
    const number = NumberParam::class;
    const relation = RelationParam::class;
    const string = StringParam::class;

    abstract static function apply(Builder $query, array $data): void;
    abstract static function validate(Validator $validator, string $key): void;
}
