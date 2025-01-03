<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\Resources\SagaResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SagaCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "data" => SagaResource::collection($this->collection),
            "meta" => [
                "total" => $this->collection->count()
            ]
        ];
    }
}
