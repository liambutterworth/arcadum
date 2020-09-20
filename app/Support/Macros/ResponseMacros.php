<?php

namespace App\Support\Macros;

use Closure;
use Illuminate\Http\Response;

class ResponseMacros
{
    public function success(): Closure
    {
        return function($data = null) {
            switch (request()->method()) {
                case 'GET':
                    return $this->successfulGet($data);
                    break;

                case 'POST':
                    return $this->successfulPost();
                    break;

                case 'PUT':
                    return $this->successfulPut();
                    break;

                case 'DELETE':
                    return $this->successfulDelete();
                    break;
            }
        };
    }

    public function successfulGet(): Closure
    {
        return function($data) {
            if (is_null($data)) {
                return $this->notFound();
            }

            return $this->json([
                'success' => true,
                'data' => $data,
            ], Response::HTTP_OK);
        };
    }

    public function successfulPost(): Closure
    {
        return function() {
            return $this->json([
                'success' => true,
            ], Response::HTTP_CREATED);
        };
    }

    public function successfulPut(): Closure
    {
        return function() {
            return $this->json([
                'success' => true,
            ], Response::HTTP_NO_CONTENT);
        };
    }

    public function successfulDelete(): Closure
    {
        return function() {
            return $this->json([
                'success' => true,
            ], Response::HTTP_NO_CONTENT);
        };
    }

    public function error(): Closure
    {
        return function(string $message) {
            return $this->json([
                'success' => false,
                'error' => $message,
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        };
    }

    public function notFound(): Closure
    {
        return function() {
            return $this->json([
                'success' => false,
                'error' => 'Resource Not Found'
            ], Response::HTTP_NOT_FOUND);
        };
    }
}
