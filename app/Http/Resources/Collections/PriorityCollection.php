<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\Resources\PriorityResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PriorityCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "data" => PriorityResource::collection($this->collection),
            "meta" => [
                "total" => $this->collection->count()
            ]
        ];
    }
}