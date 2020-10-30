<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder as BaseSeeder;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class ResourceSeeder extends BaseSeeder
{
    public function set(string $namespace, string $name, $instance): void
    {
        $slug = Str::of($name)->slug();
        Cache::put("seeders.$namespace.$slug", $instance);
    }

    public function get(string $namespace, string $name)
    {
        return Cache::get("seeders.$namespace.$name");
    }

    public function getMany(string $namespace, array $names)
    {
        return collect($names)->map(function(string $name) use($namespace) {
            return $this->get($namespace, $name);
        });
    }
}
