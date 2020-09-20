<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AppController extends Controller
{
    public function app(): View
    {
        return view('app');
    }
}
