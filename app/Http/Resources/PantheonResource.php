<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PantheonResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
        ];
    }
}
