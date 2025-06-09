<?php

namespace Passionatelaraveldev\Topview\Concerns;

use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response as FacadesResponse;

trait HasStatusResponse
{
    /**
     * response with status for api response handle
     */
    public function jsonStatusResponse(Response $res): JsonResponse
    {
        if ($res->successful() && ($res->json('code') > 199 && $res->json('code') < 300)) {
            return FacadesResponse::json([
                'status' => 'success',
                'resData' => $res->json('result') ?? $res->json(),
            ]);
        }

        if ($res->unauthorized()) {
            return FacadesResponse::json([
                'status' => 'error',
                'message' => $res->json('message') ?? 'Unauthorized',
            ], 401);
        }

        Log::error('Topview API error response', [
            'status' => $res->status(),
            'body' => $res->body(),
        ]);

        return FacadesResponse::json([
            'status' => 'error',
            'message' => $res->json('message') ?? 'Unexpected error happen',
        ], $res->status());
    }
}
