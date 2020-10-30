<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QueryRequest extends FormRequest
{
    public function authorize()
    {
        return false;
    }

    public function rules()
    {
        return [
            'filter' => [],
            'include' => [],
            'paginate' => [],
            'sort' => [],
        ];
    }
}
