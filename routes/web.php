<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// use App\Models\CharacterClassType;
Route::get('/{any?}', function () {
    // $c = CharacterClassType::find(1);
    // $a = $c->archetypes->firstWhere('name', 'Berserker');
    // dd($a->level(3)->features);
    return view('home');
});
