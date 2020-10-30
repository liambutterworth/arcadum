<?php

namespace App\Http\Params;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Validator;

class StringParam extends Param
{
    public static function apply(Builder $query, array $data): void
    {
        extract($data);

        switch ($operator) {
            case 'ends':
                $query->where($name, 'like', "%$value");
                break;

            case 'in':
                $query->whereIn($name, explode(',', $value));
                break;

            case 'like':
                $query->where($name, 'like', "%$value%");
                break;

            case 'not':
                $query->where($name, '!=', $value);
                break;

            case 'not_like':
                $query->where($name, 'not like', "%{$value}%");
                break;

            case 'starts':
                $query->where($name, 'like', "{$value}%");
                break;

            default:
                $query->where($name, $value);
                break;
        }
    }

    public static function validate(Validator $validator, string $key): void
    {
        $validator->addRules([
            "$key.operator" => 'in:ends,in,like,not,not_like,starts',
        ]);

        $validator->setCustomMessages([
            "$key.operator.in" => "Operator is invalid, must be one of: :values",
        ]);
    }
}
