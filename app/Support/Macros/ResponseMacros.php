<?php

namespace App\Support\Macros;

use Closure;
// use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

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
                    return $this->successfulPost($data);
                    break;

                case 'PUT':
                    return $this->successfulPut($data);
                    break;

                case 'DELETE':
                    return $this->successfulDelete();
                    break;
            }
        };
    }

    public function successfulGet(): Closure
    {
        return function($data = null) {
            if (is_null($data)) return $this->notFound();
            // return $this->make($data, Response::HTTP_OK);
            return new JsonResponse($data, JsonResponse::HTTP_OK);
            // return $this->json($data, Response::HTTP_OK);
        };
    }

    public function successfulPost(): Closure
    {
        return function($data = null) {
            $code = is_null($data) ? Response::HTTP_NO_CONTENT : Response::HTTP_OK;
            return $this->json($data, $code);
        };
    }

    public function successfulPut(): Closure
    {
        return function($data = null) {
            $code = is_null($data) ? Response::HTTP_NO_CONTENT : Response::HTTP_OK;
            return $this->json($data, $code);
        };
    }

    public function successfulDelete(): Closure
    {
        return function() {
            return $this->json(null, Response::HTTP_NO_CONTENT);
        };
    }

    public function error(): Closure
    {
        return function(string $message, ?int $code = null) {
            return $this->json($message, $code ?: Response::HTTP_INTERNAL_SERVER_ERROR);
        };
    }

    public function notFound(): Closure
    {
        return function() {
            return $this->error('Resource not found', Response::HTTP_NOT_FOUND);
        };
    }
}
