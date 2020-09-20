<?php

namespace App\Http\Controllers\Api;

use App\Models\SeriesInstallment;
use Illuminate\Http\JsonResponse;

class SeriesInstallmentController extends Controller
{
    public function index(int $seriesId): JsonResponse
    {
        $installments = Series::with('installments')->find($seriesId)->installments;
        return response()->success($installments);
    }

    public function store(): JsonResponse
    {
        SeriesInstallment::create(request()->all());
        return response()->success();
    }

    public function update(int $seriesId, int $installmentId): JsonResponse
    {
        SeriesInstallment::find($installmentId)->save(request()->all());
        return response()->success();
    }

    public function destroy(int $seriesId, int $installmentId): JsonResponse
    {
        SeriesInstallment::destroy($installmentId);
        return response()->success();
    }
}
