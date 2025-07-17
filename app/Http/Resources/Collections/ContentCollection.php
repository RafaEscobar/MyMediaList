<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\Resources\ContentSummaryResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ContentCollection extends ResourceCollection
{
    protected $withMeta;

    public function __construct($resource, bool $withMeta = true)
    {
        parent::__construct($resource);
        $this->withMeta = $withMeta;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toResponse($request, $withMeta = true): JsonResponse
    {
        $response = ($this->withMeta) ? [
            'data' => ContentSummaryResource::collection($this->collection),
            'meta' => [
                'total' => $this->collection->count(),
                'links' => [
                    'first' => $this->url(1),
                    'last' => $this->url($this->lastPage()),
                    'prev' => $this->previousPageUrl(),
                    'next' => $this->nextPageUrl(),
                ],
            ]
        ] : ['data' => ContentSummaryResource::collection($this->collection)];
        /** @var AbstractPaginator $this->resource */
        return response()->json($response);
    }

    public static function success($data = null, string $message, int $code = 200)
    {
        return response()->json([
            'success' => true,
            'message' => $message ?? 'An error ocurred',
            'data' => $data,
            'errors' => null,
            'meta' => [
                'timestamp' => now()->toISOString(),
                ''
            ]
        ]);
    }

}
