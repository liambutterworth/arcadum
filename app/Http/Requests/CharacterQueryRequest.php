<?php

namespace App\Http\Requests;

use App\Models\Character;
use App\Http\Params\Param;

class CharacterQueryRequest extends QueryRequest
{
    protected string $model = Character::class;

    public function includes(): array
    {
        return [
            'race',
        ];
    }

    public function sorts(): array
    {
        return [
            'created_at',
        ];
    }

    public function filters(): array
    {
        return [
            'name' => Param::string,
        ];
    }
}
