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

use App\Models\Planet;
use App\Models\Region;
Route::get('/{any?}', function () {
    // $planet = Planet::find(2);
    $region = Region::find(1);
    $region->planet_id = 1;
    $region->save();
    // $planet->regions()->save($region);
    // $region->planet()->save($planet);
    // dd($planet->name, $region->name);
    return view('home');
});
