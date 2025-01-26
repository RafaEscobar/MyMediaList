<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\Resources\PostViewPriorityResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class PostViewPriorityCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "data" => PostViewPriorityResource::collection($this->collection),
            "meta" => [
                "total" => $this->collection->count()
            ]
        ];
    }
}
