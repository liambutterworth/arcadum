<?php

namespace App\Models\Concerns;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

trait BelongsToSelf
{
    private array $ancestors = [];
    private array $descendents = [];

    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id')->with('parent');
    }

    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id')->with('children');
    }

    public function siblings(): Collection
    {
        return self::where($this->getKeyName(), '!=', $this->id)->where('parent_id', $this->parent_id);
    }

    public function scopeRoot(Builder $query): Builder
    {
        return $query->whereNull('parent_id');
    }

    private function collectAncestors(self $parent): void
    {
        $this->ancestors[] = $parent;

        if ($parent->parent) {
            $this->collectAncestors($parent->parent);
        }
    }

    public function getAncestors(): Collection
    {
        if ($this->parent) {
            $this->collect($this->parent);
        }

        return collect($this->ancestors);
    }

    private function collectDescendents(Collection $children): void
    {
        foreach ($children as $child) {
            $this->descendents[] = $child;
            $this->collectDescendents($child->children);
        }
    }

    public function getDescendents(): Collection
    {
        if ($this->children) {
            $this->collectDescendents($this->children);
        }

        return collect($this->descendents);
    }
}
