<?php

namespace App\Http\Params\Filters;

class RelationFilter extends Filter
{
    public function apply($query, $value)
    {
        $query->whereHas($this->name, function($query) use($value) {
            $query->whereIn('id', explode(',', $value));
        });
    }
}
