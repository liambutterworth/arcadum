<?php

namespace App\Models\Concerns;

use App\Models\Character;
use Illuminate\Support\Str;

trait HasRequiredStats
{
    private function validateRequiredStats(string $value): void
    {
        $keys = Str::of($value)->matchAll('/[a-z]+/');
        $symbols = Str::of($value)->matchAll('/[^a-z0-9]+/');
        $acceptedKeys = collect(['strength', 'dexterity', 'constitution', 'intelligence', 'wisdom', 'charisma']);
        $acceptedSymbols = collect(['=', '!=', '>', '>=', '<', '<=', '&', '|']);
        $invalidKeys = $keys->diff($acceptedKeys);
        $invalidSymbols = $symbols->diff($acceptedSymbols);

        if ($invalidKeys->isNotEmpty()) {
            $message = 'Invalid keys given for required_stats: ';
            $message .= $invalidKeys->implode(', ');
            $message .= '. Accepted: ';
            $message .= $acceptedKeys->implode(', ');
            throw new Exception($message);
        }

        if ($invalidSymbols->isNotEmpty()) {
            $message = 'Invalid symbols given for required_stats: ';
            $message .= $invalidSymbols->implode(', ');
            $message .= '. Accepted ';
            $message .= $acceptedSymbols->implode(', ');
            throw new Exception($message);
        }
    }

    public function setRequiredStatsAttribute(?string $value)
    {
        if (!is_null($value)) {
            $value = Str::lower($value);
            $this->validateRequiredStats($value);
        }

        $this->attributes['required_stats'] = $value;
    }

    public function hasRequiredStats(Character $character): bool
    {
        if (is_null($this->required_stats)) return true;

        $failed = Str::of($this->required_stats)->split('/&/')->first(function($and) use($character) {
            $results = Str::of($and)->split('/\|/')->map(function($or) use($character) {
                $string = Str::of($or);
                $stat = (string) $string->match('/[a-z]+/');
                $operator = (string) $string->match('/[^a-z0-9]+/');
                $value = (int) (string) $string->match('/[0-9]+/');

                switch ($operator) {
                    case '=':
                        return $character->{$stat} == $value;
                        break;

                    case '!=':
                        return $character->{$stat} != $value;
                        break;

                    case '>':
                        return $character->{$stat} > $value;
                        break;

                    case '>=':
                        return $character->{$stat} >= $value;
                        break;

                    case '<':
                        return $character->{$stat} < $value;
                        break;

                    case '<=':
                        return $character->{$stat} <= $value;
                        break;
                }
            });

            return !$results->contains(true); // only one or clause needs to pass
        }); // get the first instance of a fail, null if all clauses passed

        return is_null($failed);
    }
}
