<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\Resources\ChapterResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ChapterCollection extends ResourceCollection
{
    public function toResponse($request)
    {
        return response()->json([
            'data' => ChapterResource::collection($this->collection),
            'meta' => [
                'total' => $this->collection->count(),
                'links' => [
                    'first' => $this->url(1),
                    'last' => $this->url($this->lastPage()),
                    'prev' => $this->previousPageUrl(),
                    'next' => $this->nextPageUrl(),
                ]
            ]
        ]);
    }

    public static function success($data = null, string $message, int $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message ?? 'Ha ocurrido un error',
            'data' => $data,
            'errors' => null,
            'meta' => [
                'timestamp' => now()->toISOString(),
                ''
            ]
        ]);
    }
}
