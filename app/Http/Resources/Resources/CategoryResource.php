<?php

namespace App\Http\Resources\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        try {
            return [
                "id" => $this->id,
                "category" => $this->category,
                "image" => $this->getMedia('categories')->first()->getUrl(),
                "subtype" => $this->subtype->subtype
            ];
        } catch (\Throwable $th) {
            throw "Category resource";
        }
    }
}
