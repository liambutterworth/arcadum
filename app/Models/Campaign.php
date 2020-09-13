<?php

namespace App\Models;

use App\Models\Concerns\HasSeries;
use App\Models\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

class Campaign extends Model
{
    use HasFactory, HasSeries;

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class)->orderBy('sessions.index');
    }

    public function getSessionCountAttribute(): int
    {
        return is_null($this->sessions) ? 0 : $this->sessions->count();
    }

    public function reorderSessions(?array $sessions = null): void
    {
        if (is_null($sessions)) {
            $sessions = $this->sessions;
        }

        foreach ($sessions as $index => $session) {
            if (!$session instanceof session) {
                $session = Session::find($session);
            }

            $session->index = $index;
            $session->save();
        }
    }
}
