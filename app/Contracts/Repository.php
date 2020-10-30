<?php

namespace App\Contracts;

use App\Contracts\Repository as Contract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface Repository
{
    public function all(): Collection;
    public function find(int $id): Model;
    public function create(array $data): Model;
    public function update(array $data): Model;
    public function delete(int $id): void;
}
