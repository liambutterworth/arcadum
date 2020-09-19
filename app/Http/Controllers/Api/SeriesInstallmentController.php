<?php

namespace App\Http\Controllers;

use App\Models\Series;
use App\Models\SeriesInstallment;
use Illuminate\Http\Request;

class SeriesInstallmentController extends Controller
{
    public function index(Series $series)
    {
        return $series->installments;
    }

    public function show(SeriesInstallment $series)
    {
        return $series->with('campaigns');
    }

    public function store(Request $request)
    {
        Series::create($request->all());
    }

    public function update(Request $request, Series $series)
    {
        $series->save($request->all());
    }

    public function delete(Series $series, SeriesInstallment $installment)
    {
        $installment->delete();
        $series->reorder();
    }
}
