<?php

namespace App\Exceptions;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function render($request, $error)
    {
        if ($error instanceof ModelNotFoundException && $request->expectsJson()) {
            return response()->notFound();
        } else if ($request->expectsJson()) {
            return response()->error($error->getMessage());
        }

        return parent::render($request, $error);
    }
}
