<?php

namespace App\Observers;

use App\Models\Region;

class RegionObserver
{
    public function creating(Region $region)
    {
        if ($region->parent) {
            $region->planet_id = $region->parent->planet_id;
        }
    }

    public function saving(Region $region)
    {
        if ($region->isDirty('planet_id')) {
            Region::whereIn('id', $region->getDescendents()->pluck('id'))->update([
                'planet_id' => $region->planet_id,
            ]);
        }
    }
}
