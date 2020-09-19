<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Spell extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function classes(): BelongsToMany
    {
        return $this->belongsToMany(ClassType::class);
    }

    public function characters(): BelongsToMany
    {
        return $this->belongsToMany(Character::class);
    }

    public function school(): BelongsTo
    {
        return $this->belongsTo(SpellSchool::class, 'spell_school_id');
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(SpellType::class, 'spell_type_id');
    }
}
