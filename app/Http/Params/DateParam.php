<?php

namespace App\Http\Params;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Validation\Validator;

class DateParam extends Param
{
    public static function apply(Builder $query, array $data): void
    {
        extract($data);

        switch ($this->operator) {
            case 'between':
                $query->whereBetween($name, explode(',', $value));
                break;

            case 'gt':
                $query->where($name, '>', $value);
                break;

            case 'gte':
                $query->where($name, '>=', $value);
                break;

            case 'in':
                $query->whereIn($name, explode(',', $value));
                break;

            case 'lt':
                $query->where($name, '<', $value);
                break;

            case 'lte':
                $query->where($name, '<=', $value);
                break;

            default:
                $query->where($name, $value);
                break;
        }
    }

    public static function validate(Validator $validator, string $key): void
    {
        dd('validate date');

        $validator->addRules([
            "$key.operator" => 'in:between,gt,gte,in,lt,lte',
        ]);

        $validator->setCustomMessages([
            "$key.operator.in" => 'Operator must be one of: :values',
        ]);

        // $validator->sometimes("{$this->key}.value", 'date_format:Y-m-d', function($value) {
        //     return !in_array($this->operator, ['between', 'in']);
        // });
        //
        // $validator->sometimes("{$this->key}.value", 'date_between_format:Y-m-d', function($value) {
        //     return $this->operator === 'between';
        // });
        //
        // $validator->sometimes("{$this->key}.value", 'date_list_format:Y-m-d', function($value) {
        //     return $this->operator === 'in';
        // });
    }
}

