<?php

namespace App\Http\Controllers\Api;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\JsonResponse;

class Controller extends BaseController
{
    public function response($data): JsonResponse
    {
        switch (request()->method()) {
            case 'GET':
                $code = empty($data) ? JsonResponse::HTTP_NOT_FOUND : JsonResponse::HTTP_OK;
                return new JsonResponse($data, $code);
                break;

            case 'POST':
                $code = empty($data) ? JsonResponse::HTTP_NO_CONTENT : JsonResponse::HTTP_OK;
                return new JsonResponse($data, $code);
                break;

            case 'PUT':
                $code = empty($data) ? JsonResponse::HTTP_NO_CONTENT : JsonResponse::HTTP_OK;
                return new JsonResponsee($data, $code);
                break;

            case 'DELETE':
                return new JsonResponse(null, Response::HTTP_NO_CONTENT);
                break;
        }
    }
}
