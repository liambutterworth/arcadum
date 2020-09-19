<?php

namespace App\Http\Controllers;

use App\Contracts\CharacterRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class CharacterController extends Controller
{
    private CharacterRepository $character;

    public function __construct(CharacterRepository $character)
    {
        $this->character = $character;
    }

    public function index(): Collection
    {
        $this->character->all();
    }

    public function show(int $id)
    {
        return $this->character->get($id);
    }
}
