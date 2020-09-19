<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CharacterClass extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public function archetype(): BelongsTo
    {
        return $this->belongsTo(ClassArchetype::class, 'class_archetype_id');
    }

    public function character(): BelongsTo
    {
        return $this->belongsTo(Character::class);
    }

    public function type(): BelongsTo
    {
        return $this->belongsTo(ClassType::class, 'class_type_id');
    }
}
