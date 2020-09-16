<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Requirement extends Model
{
    use HasFactory;

    public function requirable(): MorphTo
    {
        return $this->morphTo();
    }

    public static function stat()
    {
        
    }

    public static function stats(array $stats, int $value): Requirement
    {
        return Requirement::make([
            'key' => collect($stats)->map(function($stat) {
                return "stats.$stat";
            }),

            'operator' => '>=',
            'value' => $value,
        ]);
    }

    public static function race(Race $race): Requirement
    {
        return Requirement::make([
            'key' => $race->getForeignKey(),
            'operator' => '=',
            'value' => $race->id,
        ]);
    }

    public function characterClassType(CharacterClassType $class)
    {
        return Requirement::make([
            'key' => 'classes.' . $class->getForeignKey() . '.id',
            'operator' => 'in',
            'value' => $class->id,
        ]);
    }

    // public static function in(string $key, array $values): Requirement
    // {
    //     return Requirement::make([
    //         'key' => $key,
    //         'operator' => 'in',
    //         'value' => implode(',', array_map('trim', $values),
    //     ]);
    // }

    // public static function race($race): Requirement
    // {
    //     return Requirement::make([
    //         'key' => 'race_id',
    //         'operator' => '=',
    //         'value' => $race instanceof Race ? $race->id : $race,
    //     ]);
    // }

    private function compare($value) {
        switch ($this->operator) {
            // case 'in':
            //     return in_array($value, explode(',', $this->value);
            //     break;

            case '>':
                return $value > $this->value;
                break;

            case '<':
                return $value < $this->value;
                break;

            case '>=':
                return $value >= $this->value;
                break;

            case '<=':
                return $value <= $this->value;
                break;

            case '=':
                return $value == $this->value;
                break;

            case '!=':
                return $value != $this->value;
                break;
        }
    }

    private function getKeys(): Collection
    {
        return Str::contains($this->key, ',') ? Str::of($this->key)->split(',') : collect([$this->key]);
    }

    private function getValues(Character $character): Collection
    {
        return $this->getKeys()->map(function($key) use($character) {
            return Arr::get($character, $key);
        });
    }

    public function metBy(Character $character): bool
    {
        // $values = $this->getValues($character);
        // $keys = Str::contains($this->key, ',') ? Str::of($this->key)->split(',') : collect([$this->key]);
        //
        // $values = $keys->map(function($key) use($character) {
        //     return Arr::get($character, $key);
        // });
        //
        // foreach ($values as $value) {
        //     
        // }

        // if ($this->operator == 'in') {
        //     return $this->key, 
        // }
    }
}
