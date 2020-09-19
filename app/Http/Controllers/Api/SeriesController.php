<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index()
    {
        return Series::all();
    }

    public function show(Series $series)
    {
        return $series->with('campaigns');
    }

    public function create(Request $request)
    {
    }

    public function store(Request $request)
    {
        Series::create($request->all());
    }

    public function update(Request $request, Series $series)
    {
        $series->save($request->all());
    }

    public function delete()
    {
        
    }
}
