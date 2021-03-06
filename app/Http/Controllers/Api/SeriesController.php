<?php

namespace App\Http\Controllers\Api;

use App\Models\Series;
use Illuminate\Http\JsonResponse;

class SeriesController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->success(Series::all());
    }

    public function show(int $id): JsonResponse
    {
        return response()->success(Series::find($id));
    }

    public function store(): JsonResponse
    {
        Series::create(request()->all());
        return response()->success();
    }

    public function update(int $id): JsonResponse
    {
        $series = Series::find($id);
        $request = request();

        if ($request->has('installments')) {
            $series->reorder($request->get('installments'));
        }

        $series->save($request->except('installments'));
        return response()->success();
    }

    public function destroy(int $id): JsonResponse
    {
        Series::destroy($id);
        return response()->success();
    }
}
