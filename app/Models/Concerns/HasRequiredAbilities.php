<?php

namespace App\Models\Concerns;

use App\Models\Character;
use Illuminate\Support\Str;

trait HasRequiredAbilities
{
    private function validateRequiredAbilities(string $value): void
    {
        $keys = Str::of($value)->matchAll('/[a-z]+/');
        $symbols = Str::of($value)->matchAll('/[^a-z0-9]+/');
        $acceptedKeys = collect(['strength', 'dexterity', 'constitution', 'intelligence', 'wisdom', 'charisma']);
        $acceptedSymbols = collect(['=', '!=', '>', '>=', '<', '<=', '&', '|']);
        $invalidKeys = $keys->diff($acceptedKeys);
        $invalidSymbols = $symbols->diff($acceptedSymbols);

        if ($invalidKeys->isNotEmpty()) {
            $message = 'Invalid keys given for required_abilities: ';
            $message .= $invalidKeys->implode(', ');
            $message .= '. Accepted: ';
            $message .= $acceptedKeys->implode(', ');
            throw new Exception($message);
        }

        if ($invalidSymbols->isNotEmpty()) {
            $message = 'Invalid symbols given for required_abilities: ';
            $message .= $invalidSymbols->implode(', ');
            $message .= '. Accepted ';
            $message .= $acceptedSymbols->implode(', ');
            throw new Exception($message);
        }
    }

    public function setRequiredAbilitiesAttribute(?string $value)
    {
        if (!is_null($value)) {
            $value = Str::lower($value);
            $this->validateRequiredAbilities($value);
        }

        $this->attributes['required_abilities'] = $value;
    }

    public function hasRequiredAbilities(Character $character): bool
    {
        if (is_null($this->required_abilities)) return true;

        $failed = Str::of($this->required_abilities)->split('/&/')->first(function($and) use($character) {
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

            return !$results->contains(true); // only one 'or' clause needs to pass
        }); // get the first instance of a fail, null if all 'and' clauses pass

        return is_null($failed);
    }
}
